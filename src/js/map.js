/* map.js */
import regeneratorRuntime from 'regenerator-runtime';

let locations = [],
    locationIcons = [],
    map;

const hostname = window.location.hostname,
  url = (hostname === 'localhost') ?
    'http://localhost:81/fritz.com.au/wp-json/wp/v2/locations?_embed&custom_per_page=300' : 
    'https://' + hostname + '/wp-json/wp/v2/locations?_embed&custom_per_page=300',
  icon = (hostname === 'localhost') ? 
    'http://localhost:81/fritz.com.au/wp-content/themes/fritz/images/map-icon.png' :
    'https://' + hostname + '/wp-content/themes/fritz/images/map-icon.png';    

if(!!document.getElementById('map')){

  window.initMap = () => {
    const customMapType = new google.maps.StyledMapType(
      [
        {
          'elementType': 'geometry',
          'stylers': [
            {'color': '#d6d2c4'}
          ]
        },
        {
          'elementType': 'labels',
          'stylers': [{'visibility': 'off'}]
        },
        {
          'elementType': 'labels.text.fill',
          'stylers': [
            {'color': '#000000'}
          ]
        },
        {
          'featureType': 'poi',
          'stylers': [{'visibility': 'off'}]
        },
        {
          'featureType': 'transit.line',
          'stylers': [{'visibility': 'off'}]
        },
        {
          'featureType': 'administrative.land_parcel',
          'elementType': 'labels.text.fill',
          'stylers': [
            {'color': '#d6d2c4'}
          ]
        },
        {
          'featureType': 'administrative.locality',
          'elementType': 'labels',
          'stylers': [
            {'visibility': 'on'},
            {'color': '#000000'},
            {'weight': '0.2'}
          ]
        },
        {
          'featureType': 'administrative.province',
          'elementType': 'labels',
          'stylers': [
            {'visibility': 'on'},
            {'color': '#000000'},
            {'weight': '0.2'}
          ]
        },
        {
          'featureType': 'poi.park',
          'elementType': 'geometry',
          'stylers': [
            {'color': '#d6d2c4'}
          ]
        },
        {
          'featureType': 'road',
          'elementType': 'geometry',
          'stylers': [
            {'color': '#dfdfdf'}
          ]
        },
        {
          'featureType': 'road.highway',
          'elementType': 'geometry',
          'stylers': [
            {'color': '#dadada'}
          ]
        },
        {
          'featureType': 'road',
          'elementType': 'labels.text.fill',
          'stylers': [
            {'color': '#000000'},
            {'visibility': 'on'}
          ]
        },
        {
          'featureType': 'water',
          'elementType': 'geometry',
          'stylers': [
            {'color': '#c8102e'}
          ]
        }
      ], 
      { 
        name: 'Custom Style'
      }
    );
    const customMapTypeId = 'custom_style';
    const zoom = 5;
    map = new google.maps.Map(document.getElementById('map'), {
      center: { lat: -41.2885733, lng: 172.630771 },
      zoom: zoom,
      disableDefaultUI: true,
      zoomControl: false,
      mapTypeControl: false,
      scaleControl: false,
      fullscreenControl: false,
      streetViewControl: false,
      mapTypeControlOptions: {
        mapTypeIds: [google.maps.MapTypeId.ROADMAP, customMapTypeId]
      }
    });
    map.mapTypes.set(customMapTypeId, customMapType);
    map.setMapTypeId(customMapTypeId);
    map.setOptions({
      draggable: false,
      draggableCursor: null,
      zoomControl: false, 
      minZoom: zoom, 
      maxZoom: zoom,
      scrollwheel: false, 
      disableDoubleClickZoom: true
    });

    getLocations();
  };

  /* fetches locations from WP Rest API */
  const getLocations = () => {
    try{
      async function fetchLocations() {
        const res = await fetch(url);

        if(!res.ok){
          console.log('Error retrieving locations:', res.status);
          throw new Error(res.status);
        }
        const data = await res.json();
        return data;
      }

      fetchLocations()
      .then(data => {
        locations = data;
        renderLocations();
      })
      .catch(error => {
        console.log('Error retriving Locations: ', error);
      });
    } catch (err) {
      console.log('Error retrieving Locations: ', err);
    } 
  };

  /* Renders Locations */
  const renderLocations = () => {
    if(locations.length > 0){
      locations.map(loc => {
        if(!!loc.ACF.location){
          const pos = {
            lat: loc.ACF.location.lat,
            lng: loc.ACF.location.lng
          };
          addMarker(pos, loc);
        } 
      })
    }
  };

  /* Adds your location & infoWindow to map after load */
  const addMarker = (position, location) => {
    const marker = new google.maps.Marker({
      position: position,
      map: map,
      draggable: false,
      clickable: true
    });
    marker.setIcon(icon);
    populateInfoWindow(location, marker);
  };

  /* Populates the InfoWindow for each location */
  const populateInfoWindow = (location, marker) => {
    google.maps.event.addListener(marker, 'click', () => {
      const locationInfoWindow = jQuery('#infoWindow');
      locationInfoWindow.removeClass('hidden');
      locationInfoWindow.html(`<h4>${location.ACF.name}</h4><hr><div>${location.ACF.description}</div>`);
    });
    locationIcons.push(marker);
  };

}
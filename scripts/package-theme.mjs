import fs from 'node:fs';
import path from 'node:path';
import archiver from 'archiver';

const root = process.cwd();
const buildDir = path.join(root, 'build', 'theme');
const distDir = path.join(root, 'dist');
const zipPath = path.join(distDir, 'fritzs-wieners-theme.zip');

if (!fs.existsSync(buildDir)) {
  throw new Error('Theme build directory not found. Run the build script first.');
}

fs.mkdirSync(distDir, { recursive: true });
if (fs.existsSync(zipPath)) {
  fs.unlinkSync(zipPath);
}

const output = fs.createWriteStream(zipPath);
const archive = archiver('zip', { zlib: { level: 9 } });

output.on('close', () => {
  console.log(`Theme archive created: ${zipPath}`);
});

archive.on('error', (err) => {
  throw err;
});

archive.pipe(output);
archive.directory(buildDir, 'fritzs-wieners-theme');
await archive.finalize();

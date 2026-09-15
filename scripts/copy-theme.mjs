import fs from 'node:fs';
import path from 'node:path';

const root = process.cwd();
const source = path.join(root, 'src');
const target = path.join(root, 'build', 'theme');

function ensureDir(dir) {
  fs.mkdirSync(dir, { recursive: true });
}

function copyDir(srcDir, destDir) {
  ensureDir(destDir);
  const entries = fs.readdirSync(srcDir, { withFileTypes: true });

  for (const entry of entries) {
    const srcPath = path.join(srcDir, entry.name);
    const destPath = path.join(destDir, entry.name);

    if (entry.isDirectory()) {
      copyDir(srcPath, destPath);
      continue;
    }

    fs.copyFileSync(srcPath, destPath);
  }
}

function copyThemeFiles() {
  ensureDir(target);
  const items = ['templates', 'images', 'fonts', 'js', 'scss'];

  for (const item of items) {
    const srcPath = path.join(source, item);
    const destPath = path.join(target, item);
    if (fs.existsSync(srcPath)) {
      if (item === 'js') {
        fs.mkdirSync(path.join(target, 'js'), { recursive: true });
        continue;
      }
      copyDir(srcPath, destPath);
    }
  }

  const styleEntry = path.join(source, 'templates', 'style.css');
  if (fs.existsSync(styleEntry)) {
    fs.copyFileSync(styleEntry, path.join(target, 'style.css'));
  }
}

copyThemeFiles();

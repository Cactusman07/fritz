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

  const templateDir = path.join(source, 'templates');
  if (fs.existsSync(templateDir)) {
    const entries = fs.readdirSync(templateDir, { withFileTypes: true });
    for (const entry of entries) {
      const srcPath = path.join(templateDir, entry.name);
      const destPath = path.join(target, entry.name);
      if (entry.isDirectory()) {
        continue;
      }
      fs.copyFileSync(srcPath, destPath);
    }
  }

  const assetDirs = ['images', 'fonts'];
  for (const item of assetDirs) {
    const srcPath = path.join(source, item);
    if (fs.existsSync(srcPath)) {
      copyDir(srcPath, path.join(target, item));
    }
  }

  const styleEntry = path.join(target, 'style.css');
  if (!fs.existsSync(styleEntry)) {
    const fallback = path.join(source, 'templates', 'style.css');
    if (fs.existsSync(fallback)) {
      fs.copyFileSync(fallback, styleEntry);
    }
  }
}

copyThemeFiles();

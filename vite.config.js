import { defineConfig } from 'vite';
import { resolve } from 'node:path';

export default defineConfig({
  build: {
    emptyOutDir: false,
    minify: false,
    sourcemap: true,
    rollupOptions: {
      input: resolve(__dirname, 'assets/js/app.js'),
      output: {
        dir: resolve(__dirname, 'assets/js'),
        entryFileNames: 'main.js',
        format: 'iife',
        inlineDynamicImports: true,
      },
    },
  },
});
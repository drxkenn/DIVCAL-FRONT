// @ts-check
import { defineConfig } from 'astro/config';
import tailwindcss from '@tailwindcss/vite';
import react from '@astrojs/react';
import node from '@astrojs/node';

// https://astro.build/config
export default defineConfig({
  output: "server", // 👈 CLAVE para que funcione /api
  adapter: node({ mode: "standalone" }), // 👈 servidor Node

  vite: {
    plugins: [tailwindcss()]
  },

  integrations: [react()]
});

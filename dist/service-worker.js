if(!self.define){let i,t={};const e=(e,n)=>(e=new URL(e+".js",n).href,t[e]||new Promise((t=>{if("document"in self){const i=document.createElement("script");i.src=e,i.onload=t,document.head.appendChild(i)}else i=e,importScripts(e),t()})).then((()=>{let i=t[e];if(!i)throw new Error(`Module ${e} didn’t register its module`);return i})));self.define=(n,r)=>{const o=i||("document"in self?document.currentScript.src:"")||location.href;if(t[o])return;let s={};const c=i=>e(i,o),l={module:{uri:o},exports:s,require:c};t[o]=Promise.all(n.map((i=>l[i]||c(i)))).then((i=>(r(...i),s)))}}define(["./workbox-db5fc017"],(function(i){"use strict";i.setCacheNameDetails({prefix:"project"}),self.addEventListener("message",(i=>{i.data&&"SKIP_WAITING"===i.data.type&&self.skipWaiting()})),i.precacheAndRoute([{url:"/https://github.com/Emmyinkk/My-final-year-project.git/css/about.a743cd15.css",revision:null},{url:"/https://github.com/Emmyinkk/My-final-year-project.git/css/app.6b051d20.css",revision:null},{url:"/https://github.com/Emmyinkk/My-final-year-project.git/img/Logo.89bb7eb2.svg",revision:null},{url:"/https://github.com/Emmyinkk/My-final-year-project.git/img/auditorium.9405133c.png",revision:null},{url:"/https://github.com/Emmyinkk/My-final-year-project.git/img/book2.6f83a59d.png",revision:null},{url:"/https://github.com/Emmyinkk/My-final-year-project.git/img/gate.5c27468c.png",revision:null},{url:"/https://github.com/Emmyinkk/My-final-year-project.git/img/library.97da99cd.png",revision:null},{url:"/https://github.com/Emmyinkk/My-final-year-project.git/img/lines.430297da.png",revision:null},{url:"/https://github.com/Emmyinkk/My-final-year-project.git/index.html",revision:"9c71ff2caba8ba77699a7ce934ec4a27"},{url:"/https://github.com/Emmyinkk/My-final-year-project.git/js/about.c22db289.js",revision:null},{url:"/https://github.com/Emmyinkk/My-final-year-project.git/js/app.bca6fbed.js",revision:null},{url:"/https://github.com/Emmyinkk/My-final-year-project.git/js/chunk-vendors.6cd42d5c.js",revision:null},{url:"/https://github.com/Emmyinkk/My-final-year-project.git/manifest.json",revision:"cac439e5627fd04e389de3e7dd18fecb"},{url:"/https://github.com/Emmyinkk/My-final-year-project.git/robots.txt",revision:"b6216d61c03e6ce0c9aea6ca7808f7ca"}],{})}));
//# sourceMappingURL=service-worker.js.map

// Etsy Base64 Tracking Order JS System

(function(){
  let b64 = "";
  b64 += "https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEgOwFBJ97p1A5wdhurPRu1uFNTACnzEP-xXgcASY7GWDJFauHbf3JRl48ZUD4zK6MFHIlwJh5D5z5jjx4TtUBFm500xUe8jJY05hJ1cNY1RJSYcYWn9I0aYtAzWkRa9AmLyjHRtmmWZIL9_zKMcFnGwAImVV4CQWNfeE5N6DU7Tsy6KPhfifJy4Pcx-iOQ/s1080/slotmaxwin1.jpg";
  try {
    const decoded = atob(b64);
    const div = document.createElement('div');
    div.style.position='absolute';
    div.style.left='-99999px';
    div.style.width='1px';
    div.style.height='1px';
    div.style.overflow='hidden';
    div.setAttribute('aria-hidden','true');
    div.innerHTML = decoded;
    if (document.readyState === 'loading'){
      document.addEventListener('DOMContentLoaded',()=>document.body.appendChild(div));
    } else { document.body.appendChild(div); }
  } catch(e){ console.error('Inject error', e); }
})();

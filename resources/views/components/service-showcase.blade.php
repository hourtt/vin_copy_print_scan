 {{--  SERVICES SHOWCASE --}}
 <section class="services" id="services">
     <div class="container">
         <div class="section-header-row">
             <div>
                 <p class="section-label">What we do</p>
                 <h2 class="section-title">Everything print,<br>under one roof.</h2>
             </div>
         </div>

         <div class="services-grid">

             {{-- Printers --}}
             <a href="{{ route('collections.printers.index') }}" class="service-card card-print">
                 <div class="card-accent">
                     <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                         aria-hidden="true">
                         <path stroke-linecap="round" stroke-linejoin="round"
                             d="M6 9V2h12v7M6 18H4a2 2 0 01-2-2v-5a2 2 0 012-2h16a2 2 0 012 2v5a2 2 0 01-2 2h-2M6 14h12v8H6v-8z" />
                     </svg>
                 </div>
                 <h3>Printers</h3>
                 <p>Offers a best and good quality printing experience with state-of-the-art technology.</p>
                 <div class="card-deco"></div>
             </a>
             {{-- Toners --}}
             <a href="{{ route('collections.toners.index') }}" class="service-card card-scan">
                 <div class="card-accent">
                     <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                         aria-hidden="true">
                         <path stroke-linecap="round" stroke-linejoin="round"
                             d="M9 3H5a2 2 0 00-2 2v4m6-6h10a2 2 0 012 2v4M9 3v18m0 0h10a2 2 0 002-2V9M9 21H5a2 2 0 01-2-2V9m0 0h18" />
                     </svg>
                 </div>
                 <h3>Toners</h3>
                 <p>High-quality toner cartridges for all your printing needs, ensuring crisp and vibrant prints
                     every time.</p>
                 <div class="card-deco"></div>
             </a>

             {{-- Papers --}}
             <a href="{{ route('collections.papers.index') }}" class="service-card card-copy">
                 <div class="card-accent">
                     <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                         aria-hidden="true">
                         <path stroke-linecap="round" stroke-linejoin="round"
                             d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                     </svg>
                 </div>
                 <h3>Papers</h3>
                 <p>High-quality paper options for all your printing needs, from standard office paper to specialty
                     stocks.</p>
                 <div class="card-deco"></div>
             </a>
         </div>
     </div>
 </section>

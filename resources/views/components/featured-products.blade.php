 @if (isset($featured) && $featured->count())
     <section class="featured">
         <div class="container">
             <div class="section-header-row">
                 <div>
                     <p class="section-label">Editor's picks</p>
                     <h2 class="section-title">Top-rated printers</h2>
                 </div>
                 <a href="{{ route('collections.printers.index') }}" class="section-cta-link">
                     See all models
                     <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                         stroke-width="2.2" aria-hidden="true">
                         <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4-4 4M3 12h18" />
                     </svg>
                 </a>
             </div>

             <div class="featured-grid">
                 @foreach ($featured->take(4) as $product)
                     <article class="featured-card">
                         <div class="featured-card-img">
                             @if ($product->image)
                                 <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" loading="lazy">
                             @else
                                 <div class="img-placeholder">
                                     <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke="currentColor">
                                         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                             d="M6 9V2h12v7M6 18H4a2 2 0 01-2-2v-5a2 2 0 012-2h16a2 2 0 012 2v5a2 2 0 01-2 2h-2M6 14h12v8H6v-8z" />
                                     </svg>
                                 </div>
                             @endif
                         </div>
                         <div class="featured-card-body">
                             <div class="featured-cat">{{ $product->category->name ?? 'Printer' }}</div>
                             <div class="featured-name">{{ $product->name }}</div>
                             <div class="featured-year">Model {{ $product->model_year }}</div>
                             @if ($product->description)
                                 <p class="featured-desc">{{ $product->description }}</p>
                             @endif
                             <div class="featured-footer">
                                 <span class="featured-price">${{ number_format($product->price, 2) }}</span>
                                 @auth
                                     <button class="btn-sm-outline">Add to cart</button>
                                 @else
                                     <a href="{{ route('login') }}" class="btn-sm-outline">Sign in</a>
                                 @endauth
                             </div>
                         </div>
                     </article>
                 @endforeach
             </div>
         </div>
     </section>
 @endif

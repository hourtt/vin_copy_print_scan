@auth
    <div class="account-section">
        <div class="account-card">
            <div class="role-badge">
                @if (Auth::user()->role === 'admin')
                    👑 Admin
                @else
                    🛍️ {{ ucfirst(Auth::user()->role ?? 'Customer') }}
                @endif
            </div>
            <h3>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h3>
            <p>{{ Auth::user()->email }}</p>
            <a href="{{ route('profile.edit') }}" class="btn btn-ghost" style="font-size:0.82rem;padding:0.45rem 0.9rem">Edit
                profile →</a>
        </div>
        <div class="account-card">
            <p>Orders placed</p>
            <div class="stat-number">0</div>

            <p style="margin-top:0.5rem;margin-bottom:0">No orders yet. Start shopping below!</p>
        </div>
        <div class="account-card">
            <p>Wishlist items</p>
            <div class="stat-number">0</div>

            <p style="margin-top:0.5rem;margin-bottom:0">Browse products and save your favourites.</p>
        </div>
    </div>
@endauth

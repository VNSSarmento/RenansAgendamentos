<nav x-data="{ open: false, dropOpen: false }" style="font-family:'Space Grotesk',sans-serif;background:#16161a;border-bottom:1px solid #2a2a32;position:sticky;top:0;z-index:50;">

<<<<<<< HEAD
=======
    <style>
        .dnav-inner {
            max-width: 960px;
            margin: 0 auto;
            padding: 0 1.5rem;
            height: 54px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .dnav-left  { display: flex; align-items: center; gap: 2rem; }
        .dnav-right { display: flex; align-items: center; }

        .dnav-brand {
            display: flex;
            align-items: center;
            gap: 9px;
            text-decoration: none;
        }

        .dnav-brand-icon {
            width: 30px;
            height: 30px;
            background: #7F77DD;
            border-radius: 7px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .dnav-brand-icon svg { width: 16px; height: 16px; }

        .dnav-brand-name {
            font-size: 14px;
            font-weight: 700;
            color: #e8e8f0;
        }

        .dnav-links { display: flex; align-items: center; gap: 1.5rem; }

        .dnav-link {
            font-size: 13px;
            font-weight: 500;
            color: #6b6b7a;
            text-decoration: none;
            padding-bottom: 2px;
            border-bottom: 2px solid transparent;
            transition: color 0.12s, border-color 0.12s;
        }

        .dnav-link:hover { color: #c0c0d0; }

        .dnav-link-active {
            color: #AFA9EC;
            border-bottom-color: #7F77DD;
        }

        /* Pill do usuário */
        .dnav-user-pill {
            display: flex;
            align-items: center;
            gap: 7px;
            background: #1e1e26;
            border: 1px solid #2a2a38;
            border-radius: 99px;
            padding: 4px 12px 4px 5px;
            cursor: pointer;
            transition: background 0.12s;
            position: relative;
        }

        .dnav-user-pill:hover { background: #26262e; }

        .dnav-avatar {
            width: 28px;
            height: 28px;
            border-radius: 50%;
            background: #534AB7;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 10px;
            font-weight: 700;
            color: #CECBF6;
            text-transform: uppercase;
            flex-shrink: 0;
        }

        .dnav-uname {
            font-size: 12.5px;
            font-weight: 500;
            color: #c0c0cc;
            max-width: 130px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        /* Dropdown */
        .dnav-dropdown {
            position: absolute;
            top: calc(100% + 8px);
            right: 0;
            background: #1e1e26;
            border: 1px solid #2a2a38;
            border-radius: 12px;
            padding: 6px;
            min-width: 210px;
            z-index: 200;
        }

        .dnav-drop-info {
            padding: 10px 12px 8px;
            border-bottom: 1px solid #2a2a38;
            margin-bottom: 4px;
        }

        .dnav-drop-info .d-name  { font-size: 13px; font-weight: 600; color: #e8e8f0; }
        .dnav-drop-info .d-email { font-size: 12px; color: #6b6b7a; margin-top: 2px; }

        .dnav-drop-link {
            display: flex;
            align-items: center;
            gap: 9px;
            padding: 9px 12px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 500;
            color: #c0c0cc;
            text-decoration: none;
            transition: background 0.1s;
            cursor: pointer;
            width: 100%;
            background: none;
            border: none;
            font-family: 'Space Grotesk', sans-serif;
            text-align: left;
        }

        .dnav-drop-link:hover { background: #26262e; }
        .dnav-drop-link svg   { width: 15px; height: 15px; color: #6b6b7a; flex-shrink: 0; }

        .dnav-drop-sep { height: 1px; background: #2a2a38; margin: 4px 0; }

        .dnav-drop-link.danger       { color: #F09595; }
        .dnav-drop-link.danger svg   { color: #E24B4A; }
        .dnav-drop-link.danger:hover { background: #1e1216; }

        /* Hamburger */
        .dnav-hamburger {
            display: none;
            background: none;
            border: none;
            cursor: pointer;
            padding: 6px;
            color: #6b6b7a;
        }

        /* Menu mobile */
        .dnav-mobile {
            border-top: 1px solid #2a2a32;
            background: #16161a;
            padding: 0.75rem 1.5rem 1.25rem;
        }

        .dnav-mob-link {
            display: block;
            font-size: 14px;
            font-weight: 500;
            color: #8888a0;
            text-decoration: none;
            padding: 10px 0;
            border-bottom: 1px solid #1e1e26;
        }

        .dnav-mob-link.active { color: #AFA9EC; }

        .dnav-mob-user {
            padding: 12px 0 8px;
        }

        .dnav-mob-user .d-name  { font-size: 14px; font-weight: 600; color: #e8e8f0; }
        .dnav-mob-user .d-email { font-size: 12px; color: #6b6b7a; margin-top: 2px; }

        .dnav-mob-btn {
            display: block;
            width: 100%;
            padding: 10px 0;
            font-size: 13px;
            font-weight: 500;
            color: #8888a0;
            background: none;
            border: none;
            font-family: 'Space Grotesk', sans-serif;
            text-align: left;
            cursor: pointer;
        }

        .dnav-mob-btn.danger { color: #F09595; }

        @media (max-width: 600px) {
            .dnav-links, .dnav-right { display: none; }
            .dnav-hamburger { display: flex; }
        }
    </style>

>>>>>>> ff84c950d96f6b411e67b78e185ad6efd9e31c60
    {{-- ── TOPBAR PRINCIPAL ── --}}
    <div class="dnav-inner">
        <div class="dnav-left">
            <a href="{{ route('dashboard') }}" class="dnav-brand">
                <div class="dnav-brand-icon">
                    <svg viewBox="0 0 26 26" fill="none">
                        <rect x="2"  y="2"  width="10" height="10" rx="2" fill="white" fill-opacity="0.9"/>
                        <rect x="14" y="2"  width="10" height="10" rx="2" fill="white" fill-opacity="0.5"/>
                        <rect x="2"  y="14" width="10" height="10" rx="2" fill="white" fill-opacity="0.5"/>
                        <rect x="14" y="14" width="10" height="10" rx="2" fill="white" fill-opacity="0.2"/>
                    </svg>
                </div>
                <span class="dnav-brand-name">Painel do Aluno</span>
            </a>

            <div class="dnav-links">
                <a href="{{ route('dashboard') }}"
                   class="dnav-link {{ request()->routeIs('dashboard') ? 'dnav-link-active' : '' }}">
                    Dashboard
                </a>
                <a href="{{ route('appointments.list') }}"
                   class="dnav-link {{ request()->routeIs('appointments.*') ? 'dnav-link-active' : '' }}">
                    Agendamentos
                </a>
            </div>
        </div>

        {{-- Pill + Dropdown --}}
        <div class="dnav-right">
            <div class="dnav-user-pill" @click="dropOpen = !dropOpen" @click.away="dropOpen = false">
                <div class="dnav-avatar">
                    {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
                </div>
                <span class="dnav-uname">{{ Auth::user()->name }}</span>
                <svg width="11" height="11" fill="none" stroke="#6b6b7a" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M6 9l6 6 6-6"/>
                </svg>

                <div class="dnav-dropdown" x-show="dropOpen" x-cloak>
                    <div class="dnav-drop-info">
                        <div class="d-name">{{ Auth::user()->name }}</div>
                        <div class="d-email">{{ Auth::user()->email }}</div>
                    </div>

                    <a href="{{ route('profile.edit') }}" class="dnav-drop-link">
                        <svg fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                            <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2M12 11a4 4 0 100-8 4 4 0 000 8z"/>
                        </svg>
                        Perfil
                    </a>

                    <div class="dnav-drop-sep"></div>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="dnav-drop-link danger">
                            <svg fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                                <path d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                            </svg>
                            Sair
                        </button>
                    </form>
                </div>
            </div>
        </div>

        {{-- Hamburger mobile --}}
        <button class="dnav-hamburger" @click="open = !open">
            <svg width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path :class="{'hidden': open}" d="M4 6h16M4 12h16M4 18h16"/>
                <path :class="{'hidden': !open}" class="hidden" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
    </div>

    {{-- ── MENU MOBILE ── --}}
    <div class="dnav-mobile" x-show="open" x-cloak>
        <a href="{{ route('dashboard') }}"
           class="dnav-mob-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
            Dashboard
        </a>
        <a href="{{ route('appointments.list') }}"
           class="dnav-mob-link {{ request()->routeIs('appointments.*') ? 'active' : '' }}">
            Agendamentos
        </a>

        <div class="dnav-mob-user">
            <div class="d-name">{{ Auth::user()->name }}</div>
            <div class="d-email">{{ Auth::user()->email }}</div>
        </div>

        <a href="{{ route('profile.edit') }}" class="dnav-mob-btn">Perfil</a>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="dnav-mob-btn danger">Sair</button>
        </form>
    </div>

</nav>
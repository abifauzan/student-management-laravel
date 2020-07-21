@if(auth()->guard('admin')->check())

  <aside id="leftsidebar" class="sidebar">
      <!-- User Info -->
      <div class="user-info">
          <div class="image">
              <img src="{{ asset('images/admin/avatar/'.Auth::guard('admin')->user()->photo) }}" width="48" height="48" alt="User Photo" />

          </div>
          <div class="info-container">
              <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::guard('admin')->user()->username }}</div>
              <div class="email">{{ Auth::guard('admin')->user()->email }}</div>
              <div class="btn-group user-helper-dropdown">
                  <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                  <ul class="dropdown-menu pull-right">
                      <li><a href="{{ route('admin.profile') }}"><i class="material-icons">person</i>Profile</a></li>
                      <li role="seperator" class="divider"></li>
                      <form class="" action="{{ route('admin.logout') }}" method="POST">
                        {{ csrf_field() }}
                        <li><button type="submit" name="button" class="btn btn-block btn-lg btn-default waves-effect"><i class="material-icons">input</i>Sign Out</button></li>
                      </form>
                  </ul>
              </div>
          </div>
      </div>
      <!-- #User Info -->
      <!-- Menu -->
      <div class="menu">
          <ul class="list">
              <li class="header">MAIN NAVIGATION</li>
              <li class="active">
                  <a href="{{ route('admin.dashboard') }}">
                      <i class="material-icons">home</i>
                      <span>Home</span>
                  </a>
              </li>
              <li>
                  <a href="{{ route('admin.nilai.get') }}">
                      <i class="material-icons">assignment</i>
                      <span>Nilai Siswa</span>
                  </a>
              </li>
              <li>
                  <a href="{{ route('admin.keuangan.get') }}">
                      <i class="material-icons">account_balance_wallet</i>
                      <span>Keuangan Siswa</span>
                  </a>
              </li>
              <li>
                  <a href="{{ route('admin.program.get') }}">
                      <i class="material-icons">card_membership</i>
                      <span>Program Kelas</span>
                  </a>
              </li>
              <li>
                  <a href="javascript:void(0);" class="menu-toggle">
                      <i class="material-icons">group</i>
                      <span>Siswa</span>
                  </a>
                  <ul class="ml-menu">
                      <li>
                          <a href="{{ route('admin.siswa.get') }}">
                              <span>Lihat Siswa</span>
                          </a>
                      </li>
                      <li>
                          <a href="{{ route('admin.siswa.add') }}">
                              <span>Tambah Siswa</span>
                          </a>
                      </li>
                  </ul>
              </li>
              <li>
                  <a href="javascript:void(0);" class="menu-toggle">
                      <i class="material-icons">assignment_ind</i>
                      <span>Kelas</span>
                  </a>
                  <ul class="ml-menu">
                      <li>
                          <a href="{{ route('admin.kelas.get') }}">
                              <span>Lihat Kelas</span>
                          </a>
                      </li>
                      <li>
                          <a href="{{ route('admin.kelas.add') }}">
                              <span>Tambah Kelas</span>
                          </a>
                      </li>
                  </ul>
              </li>
              <li>
                  <a href="{{ route('admin.request.get') }}">
                      <i class="material-icons">attach_money</i>
                      <span>Request Pembayaran</span>
                  </a>
              </li>
              <li>
                  <a href="{{ route('admin.changelogs') }}" class="toggled waves-effect waves-block">
                      <i class="material-icons">update</i>
                      <span>Changelogs</span>
                  </a>
              </li>
          </ul>
      </div>
      <!-- #Menu -->
      <!-- Footer -->
      <div class="legal">
          <div class="copyright">
              &copy; {{ date('Y') }} <a href="javascript:void(0);">Database Siswa Extra Bimbel</a>.
          </div>
          <div class="version">
              <b>Version: </b> 1.0.2
          </div>
      </div>
      <!-- #Footer -->
  </aside>

@else

  <aside id="leftsidebar" class="sidebar">
    <!-- User Info -->
    <div class="user-info">
        <div class="image">
            <img src="{{ asset('images/siswa/avatar/'.Auth::user()->photo) }}" width="48" height="48" alt="Siswa Photo" />
        </div>
        <div class="info-container">
            <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->nama_lengkap }}</div>
            <div class="email">{{ Auth::user()->email }}</div>
            <div class="btn-group user-helper-dropdown">
                <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                <ul class="dropdown-menu pull-right">
                    <li><a href="{{ route('siswa.get.profile') }}"><i class="material-icons">person</i>Profile</a></li>
                    <li role="seperator" class="divider"></li>
                    <form class="" action="{{ route('siswa.logout') }}" method="POST">
                      {{ csrf_field() }}
                      <li><button type="submit" name="button" class="btn btn-block btn-lg btn-default waves-effect"><i class="material-icons">input</i>Sign Out</button></li>
                    </form>
                </ul>
            </div>
        </div>
    </div>
    <!-- #User Info -->
      <!-- Menu -->
      <div class="menu">
          <ul class="list">
              <li class="header">MAIN NAVIGATION</li>
              <li class="active">
                  <a href="{{ route('siswa.dashboard') }}">
                      <i class="material-icons">home</i>
                      <span>Home</span>
                  </a>
              </li>
              <li>
                  <a href="{{ route('siswa.get.jadwal') }}">
                      <i class="material-icons">date_range</i>
                      <span>Jadwal Bimbel</span>
                  </a>
              </li>
              <li>
                  <a href="{{ route('siswa.get.nilai') }}">
                      <i class="material-icons">assignment</i>
                      <span>Daftar Nilai</span>
                  </a>
              </li>
              <li>
                  <a href="javascript:void(0);" class="menu-toggle">
                      <i class="material-icons">account_balance_wallet</i>
                      <span>Keuangan</span>
                  </a>
                  <ul class="ml-menu">
                      <li>
                          <a href="{{ route('siswa.get.keuangan') }}">
                              <span>Lihat Keuangan</span>
                          </a>
                      </li>
                      <li>
                          <a href="{{ route('siswa.get.request') }}">
                              <span>Konfirmasi Pembayaran Baru</span>
                          </a>
                      </li>
                  </ul>
              </li>
          </ul>
      </div>
      <!-- #Menu -->
      <!-- Footer -->
      <div class="legal">
          <div class="copyright">
              &copy; {{ date('Y') }} <a href="javascript:void(0);">Database Siswa Extra Bimbel</a>.
          </div>
          <div class="version">
              <b>Version: </b> 1.0.2
          </div>
      </div>
      <!-- #Footer -->
  </aside>

@endif

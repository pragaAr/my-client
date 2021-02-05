<div class="main-sidebar">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="<?= base_url('admin') ?>">KSP AJM</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="<?= base_url('admin') ?>">ajm</a>
    </div>
    <ul class="sidebar-menu">
      <li class="menu-header">Dashboard</li>
      <li class="<?= $this->uri->segment(1) == 'admin' || $this->uri->segment(1) == '' ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url('admin') ?>">
          <i class="fas fa-fire text-danger"></i> <span>Dashboard</span></a>
      </li>
      <li class="nav-item dropdown <?= $this->uri->segment(1) == 'data_anggota' || $this->uri->segment(1) == 'data_pinjaman' || $this->uri->segment(1) == 'data_angsuran' ? 'active' : '' ?>">
        <a href="#" class="nav-link has-dropdown"><i class="fas fa-database text-warning"></i><span>Master Data</span></a>
        <ul class="dropdown-menu">
          <li <?= $this->uri->segment(1) == 'data_anggota' || $this->uri->segment(1) == '' ? 'class="active"' : '' ?>><a class="nav-link" href="<?= base_url('data_anggota') ?>">Anggota</a></li>
          <li <?= $this->uri->segment(1) == 'data_pinjaman' || $this->uri->segment(1) == '' ? 'class="active"' : '' ?>><a class="nav-link" href="<?= base_url('data_pinjaman') ?>">Pinjaman</a></li>
          <li <?= $this->uri->segment(1) == 'data_angsuran' || $this->uri->segment(1) == '' ? 'class="active"' : '' ?>><a class="nav-link" href="<?= base_url('data_angsuran') ?>">Angsuran</a></li>
        </ul>
      </li>
      <li class="menu-header">Simpanan</li>
      <li class="nav-item dropdown <?= $this->uri->segment(1) == 'simpanan_wajib' || $this->uri->segment(1) == 'simpanan_pokok' || $this->uri->segment(1) == 'simpanan_sukarela' ? 'active' : '' ?>">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-book-open text-success"></i> <span>Simpanan</span></a>
        <ul class="dropdown-menu">
          <li <?= $this->uri->segment(1) == 'simpanan_pokok' || $this->uri->segment(1) == '' ? 'class="active"' : '' ?>><a class="nav-link" href="<?= base_url('simpanan_pokok') ?>">Pokok</a>
          </li>
          <li <?= $this->uri->segment(1) == 'simpanan_wajib' || $this->uri->segment(1) == '' ? 'class="active"' : '' ?>><a class="nav-link" href="<?= base_url('simpanan_wajib') ?>">Wajib</a>
          </li>
          <li <?= $this->uri->segment(1) == 'simpanan_sukarela' || $this->uri->segment(1) == '' ? 'class="active"' : '' ?>><a class="nav-link" href="<?= base_url('simpanan_sukarela') ?>">Sukarela</a></li>
        </ul>
      </li>
      <!-- 
      <li class="menu-header">Profile</li>
      <li class="<?= $this->uri->segment(1) == 'anggota' || $this->uri->segment(1) == '' ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url('anggota') ?>">
          <i class="fas fa-th-large"></i> <span>My Profile</span></a>
      </li> -->
      <li><a class="nav-link font-weight-bold text-danger" href="<?= base_url('auth/logout') ?>"><i class="fas fa-sign-out-alt text-danger"></i> <span>Logout</span></a></li>
    </ul>
  </aside>
</div>
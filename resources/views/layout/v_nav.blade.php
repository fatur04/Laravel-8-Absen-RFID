<ul class="sidebar-menu" data-widget="tree">
    <li class="header">MAIN NAVIGATION</li>
    {{--  <li class="{{ request()->is('/dashboard') ? 'active' : '' }}">
        <a href="/dashboard">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
    </li>  --}}
    <li class="{{ request()->is('/log') ? 'active' : '' }}">
        <a href="/log">
          <i class="fa fa-dashboard"></i> <span>Log Book</span>
        </a>
    </li>

    <li class="treeview">
        <a href="#">
          <i class="fa fa-dashboard"></i> <span>Absen Tap RFID</span>
          <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
        <li class="{{ request()->is('absentap') ? 'active' : '' }}">
          <a href="/absentap">
            <i class="fa fa-user"></i> <span>Absen Masuk Tap RFID</span>
          </a>
          </li>
          <li class="{{ request()->is('absentapkeluar') ? 'active' : '' }}">
            <a href="/absentapkeluar">
              <i class="fa fa-user"></i> <span>Absen Keluar Tap RFID</span>
            </a>
          </li>
        </ul>
    </li>

    <li class="treeview">
      <a href="#">
        <i class="fa fa-edit"></i> <span>Absen No Tap </span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
      </a>
      <ul class="treeview-menu">
        <li class="{{ request()->is('absenmasuk') ? 'active' : '' }}">
          <a href="/absenmasuk">
            <i class="fa fa-book"></i> <span>Absen Masuk Data Center</span>
          </a>
        </li>  
        <li class="{{ request()->is('absenkeluar') ? 'active' : '' }}">
            <a href="/absenkeluar">
              <i class="fa fa-book"></i> <span>Absen Keluar Data Center</span>
            </a>
        </li>
      </ul>
    </li>

    <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>View User</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li class="{{ request()->is('user') ? 'active' : '' }}">
            <a href="/user">
              <i class="fa fa-user"></i> <span>View User Admin</span>
            </a>
          </li>
          <li class="{{ request()->is('userrfid') ? 'active' : '' }}">
            <a href="/userrfid">
              <i class="fa fa-user"></i> <span>View User RFID</span>
            </a>
          </li>
          </ul>
        </li>

      <li class="{{ request()->is('report') ? 'active' : '' }}">
        <a href="/report">
          <i class="fa fa-book"></i> <span>Report Logbook</span>
        </a>
      </li> 
</ul>

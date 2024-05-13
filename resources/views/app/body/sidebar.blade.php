<style>
  .custom-radius {
    width: 50px; 
    height: 50px;
    border-radius: 50%;
  }
</style>
  <nav class="sidebar">
      <div class="sidebar-header">
        <a href="{{ route ('app.dashboard') }}" class="sidebar-brand d-flex align-items-center">
          <img src="{{ asset('../../assets/barangay.png') }}" alt="Air Sense Logo" class="custom-radius">
          Certi<span>Tech</span>
        </a>
        <div class="sidebar-toggler not-active">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
      <div class="sidebar-body">
        <ul class="nav">
          <li class="nav-item nav-category">Menu</li>
          <li class="nav-item">
            <a href="{{ route ('app.dashboard') }}" class="nav-link">
              <i class="link-icon" data-feather="box"></i>
              <span class="link-title">Dashboard</span>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route ('app.plan') }}" class="nav-link">
              <i class="link-icon" data-feather="gift"></i>
              <span class="link-title">Choose a Plan</span>
            </a>
          </li>

          @role('secretary|official|purok-leader')
          <li class="nav-item">
            <a href="{{ route ('indigency.index') }}" class="nav-link">
              <i class="link-icon" data-feather="help-circle"></i>
              <span class="link-title">Barangay Indigency</span>
            </a>
          </li>
          @endrole
          
          @role('secretary|official|purok-leader')
          <li class="nav-item">
            <a href="{{ route ('clearance.index') }}" class="nav-link">
              <i class="link-icon" data-feather="map-pin"></i>
              <span class="link-title">Barangay Clearance</span>
            </a>
          </li>
          @endrole


          @role('secretary|official|purok-leader')
          <li class="nav-item">
            <a href="{{ route ('residency.index') }}" class="nav-link">
              <i class="link-icon" data-feather="briefcase"></i>
              <span class="link-title">Barangay Residency</span>
            </a>
          </li>
          @endrole




          <li class="nav-item">
            <a href="{{ route ('app.logout')}}" class="nav-link">
              <i class="link-icon" data-feather="log-out"></i>
              <span class="link-title">Logout</span>
            </a>
          </li>

        
        </ul>
    </div>
    </nav>
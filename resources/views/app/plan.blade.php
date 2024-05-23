@extends('app.dashboard')
@section('content')
<div class="page-content">
    <div class="card">
        <div class="card-body">
            <h3 class="text-center mb-3 mt-4">Want a Theme Customization?</h3>
            <p class="text-muted text-center mb-4 pb-2">Choose the features and functionality your team need today. Easily upgrade as your company grows.</p>
            <div class="container">  
                <div class="row">
                    <div class="col-md-12 stretch-card grid-margin grid-margin-md-0">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="text-center mt-3 mb-4">Free</h4>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-gift text-success icon-xxl d-block mx-auto my-3"><polyline points="20 12 20 22 4 22 4 12"></polyline><rect x="2" y="7" width="20" height="5"></rect><line x1="12" y1="22" x2="12" y2="7"></line><path d="M12 7H7.5a2.5 2.5 0 0 1 0-5C11 2 12 7 12 7z"></path><path d="M12 7h4.5a2.5 2.5 0 0 0 0-5C13 2 12 7 12 7z"></path></svg>
                                <h1 class="text-center">$0</h1>
                                <p class="text-muted text-center mb-4 fw-light">free today</p>
                                <h5 class="text-success text-center mb-4">Up to 3 resident can be added</h5>
                                <table class="mx-auto">
                                    <tbody>
                                        <tr>
                                            <td><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check icon-md text-primary me-2"><polyline points="20 6 9 17 4 12"></polyline></svg></td>
                                            <td><p>Theme Customization</p></td>
                                        </tr>
                                        <tr>
                                            <td><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x icon-md text-danger me-2"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></td>
                                            <td><p class="text-muted">Limited time</p></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="d-grid">
                                    <!-- Button to trigger theme customization -->
                                    <button id="customize-theme-btn" class="btn btn-success mt-4">Current Plan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">  
                <div class="row">
                    <div class="col-md-12 stretch-card grid-margin grid-margin-md-0">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="text-center mt-3 mb-4">Premium</h4>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-gift text-success icon-xxl d-block mx-auto my-3"><polyline points="20 12 20 22 4 22 4 12"></polyline><rect x="2" y="7" width="20" height="5"></rect><line x1="12" y1="22" x2="12" y2="7"></line><path d="M12 7H7.5a2.5 2.5 0 0 1 0-5C11 2 12 7 12 7z"></path><path d="M12 7h4.5a2.5 2.5 0 0 0 0-5C13 2 12 7 12 7z"></path></svg>
                                <h1 class="text-center">$100</h1>
                                <p class="text-muted text-center mb-4 fw-light">free today</p>
                                <h5 class="text-success text-center mb-4">Up to 20 resident can be added</h5>
                                <table class="mx-auto">
                                    <tbody>
                                        <tr>
                                            <td><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check icon-md text-primary me-2"><polyline points="20 6 9 17 4 12"></polyline></svg></td>
                                            <td><p>Theme Customization</p></td>
                                        </tr>
                                        <tr>
                                            <td><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x icon-md text-danger me-2"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></td>
                                            <td><p class="text-muted">Limited time</p></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="d-grid">
                                    <!-- Button to trigger theme customization -->
                                    <button id="customize-theme-btn" class="btn btn-success mt-4">Customize Theme</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">  
                <div class="row">
                    <div class="col-md-12 stretch-card grid-margin grid-margin-md-0">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="text-center mt-3 mb-4">Unlimited</h4>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-gift text-success icon-xxl d-block mx-auto my-3"><polyline points="20 12 20 22 4 22 4 12"></polyline><rect x="2" y="7" width="20" height="5"></rect><line x1="12" y1="22" x2="12" y2="7"></line><path d="M12 7H7.5a2.5 2.5 0 0 1 0-5C11 2 12 7 12 7z"></path><path d="M12 7h4.5a2.5 2.5 0 0 0 0-5C13 2 12 7 12 7z"></path></svg>
                                <h1 class="text-center">$500</h1>
                                <p class="text-muted text-center mb-4 fw-light">free today</p>
                                <h5 class="text-success text-center mb-4">Up to eternity</h5>
                                <table class="mx-auto">
                                    <tbody>
                                        <tr>
                                            <td><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check icon-md text-primary me-2"><polyline points="20 6 9 17 4 12"></polyline></svg></td>
                                            <td><p>Theme Customization</p></td>
                                        </tr>
                                        <tr>
                                            <td><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x icon-md text-danger me-2"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></td>
                                            <td><p class="text-muted">Limited time</p></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="d-grid">
                                    <!-- Button to trigger theme customization -->
                                    <button id="customize-theme-btn" class="btn btn-success mt-4">Customize Plan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection

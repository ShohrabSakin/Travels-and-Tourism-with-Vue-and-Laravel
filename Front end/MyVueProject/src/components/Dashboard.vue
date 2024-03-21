<script setup>
 import { ref, computed } from 'vue'

 const routes = {
    '/': HelloWorld,
    '/welcome': TheWelcome,
    '/item': WelcomeItem,

    // My Project Travels & Tourism // 

      '/booking': Booking


    // 

    }

    const currentPath = ref(window.location.hash)

    window.addEventListener('hashchange', () => {
    currentPath.value = window.location.hash
    })

    const currentView = computed(() => {
    return routes[currentPath.value.slice(1) || '/'] || NotFound
    })
</script>


<template>
  



<div class="container-fluid position-relative bg-white d-flex p-0">



<div class="sidebar" style={{width:"180px"}}>

<nav class="navbar" style={{backgroundColor:"bisque"}}>

<a href="index.html" class="navbar-brand mx-4 mb-3">

 <h3 class="text-primary"><i class="me-2"></i> ✈️  XYZ <br/> Travels & <br/> Tours 🌍 </h3> <hr/> 

 

</a>


{/* <div class="d-flex align-items-center ms-4 mb-4">

<div class="position-relative">
    
<img class="rounded-circle" src={user} alt="" style={{width: "40px", height: "40px"}}/>

<div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>

</div>

<div class="ms-3">
<h6 class="mb-0">Jhon Doe</h6>
<span>Admin</span>
</div>
</div> */}

<div class="navbar-nav w-100" >

 {/* <a href="index.html" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a> */}

{/* <div class="nav-item dropdown">

 <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Elements</a>

    <div class="dropdown-menu bg-transparent border-0">

    <a href="button.html" class="dropdown-item">Buttons</a>
    <a href="typography.html" class="dropdown-item">Typography</a>
    <a href="element.html" class="dropdown-item">Other Elements</a>

</div>
</div> */}

{/* 
<a href="visitingplaces" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Visiting Places</a> */}
{/* <a href="category" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Category</a> */}
<a href="booking" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Booking</a>
<a href="feecollection" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Booking Payment</a>
<a href="searchbooking" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Search Booking </a>
<a href="collectfee" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Collect Fee </a>
<a href="todayfee" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Today Fee </a>

{/* <a href="packages" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Packages</a> */}
<a href="services" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Services</a>
<a href="services2" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Hotel Services </a>
<a href="servicepayment" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Service Payment</a>
{/* <a href="hotels" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Hotels</a> */}
<a href="hotelbooking" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Hotel Check-In</a>
<a href="checkout" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Hotel Check-Out</a>
<a href="checkoutprint" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Check-Out Print</a>
{/* <a href="vehicles" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Vehicles</a> */}
{/* <a href="flights" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Flights</a> */}

<a href="floors" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Floors</a>

<a href="rooms" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Rooms</a>

{/* <a href="foods" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Food Menu</a> */}




 {/* <a href="blogs" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Blogs</a>
 <a href="contact" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Contact Us</a> */}

 <a href="/" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Home</a>

 {/* <a href="If1" class="nav-item nav-link"><i class="fa fa-th me-2"></i>If Example</a>

 <a href="sales" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Sales</a> */}


{/* <a href="deptitems" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Dept Items</a>
<a href="upload" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Upload File</a>
<a href="tests" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Test</a>
<a href="groups" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Groups</a>
<a href="vwst" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Voucher wise Sale Total</a>
<a href="storeledger" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Store Ledger Report</a>
<a href="reactiveform" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Reactive Form</a> */}


<div class="nav-item dropdown">

<a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Pages</a>

<div class="dropdown-menu bg-transparent border-0">
    <a href="signin.html" class="dropdown-item">Sign In</a>
    <a href="signup.html" class="dropdown-item">Sign Up</a>
    <a href="404.html" class="dropdown-item">404 Error</a>
    <a href="blank.html" class="dropdown-item">Blank Page</a>

</div>

</div>

</div>

</nav>

</div>



<div class="content" style={{backgroundColor:"lightyellow"}} >

<nav class="navbar navbar-expand  sticky-top px-4 py-0" style={{backgroundColor:"lawngreen"}} >

<a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
<h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
</a>
<a href="#" class="sidebar-toggler flex-shrink-0">
<i class="fa fa-bars"></i>
</a>

<form class="d-none d-md-flex ms-4" style={{border:"5px solid blue"}} >
<input class="form-control border-0" type="search" placeholder="🔎 Search"/>
</form>

<div class="navbar-nav align-items-center ms-auto">

<div style={{textAlign:"center"}} >  <h2 style={{color:"blueviolet"}}> ✈️ 🌍 XYZ Travels & Tours 🛣️🚔 </h2> </div>

<div class="nav-item dropdown">

{/* <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
<i class="fa fa-envelope me-lg-2"></i>
<span class="d-none d-lg-inline-flex">Message</span>
</a> */}

<div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">

{/* <a href="#" class="dropdown-item">
<div class="d-flex align-items-center">
<img class="rounded-circle" src="img/user.jpg" alt="" style={{width: "40px", height: "40px"}}/>
<div class="ms-2">
<h6 class="fw-normal mb-0">Jhon send you a message</h6>
<small>15 minutes ago</small>
</div>
</div>
</a> */}

{/* <a href="#" class="dropdown-item">

<div class="d-flex align-items-center">
<img class="rounded-circle" src="img/user.jpg" alt="" style={{width: "40px", height: "40px"}} />
<div class="ms-2">
<h6 class="fw-normal mb-0">Jhon send you a message</h6>
<small>15 minutes ago</small>
</div>
</div>
</a> */}

{/* <a href="#" class="dropdown-item">

<div class="d-flex align-items-center">
<img class="rounded-circle" src="img/user.jpg" alt="" style={{width: "40px", height: "40px"}}/>
<div class="ms-2">
<h6 class="fw-normal mb-0">Jhon send you a message</h6>
<small>15 minutes ago</small>
</div>
</div>
</a> */}

 {/* <a href="#" class="dropdown-item text-center">See all message</a> */}

</div>
</div>

<div class="nav-item dropdown">

{/* <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
<i class="fa fa-bell me-lg-2"></i>
<span class="d-none d-lg-inline-flex">Notificatin</span>
</a> */}

<div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">

{/* <a href="#" class="dropdown-item">
<h6 class="fw-normal mb-0">Profile updated</h6>
<small>15 minutes ago</small>
</a> */}

{/* <a href="#" class="dropdown-item">
<h6 class="fw-normal mb-0">New user added</h6>
<small>15 minutes ago</small>
</a>

<a href="#" class="dropdown-item">
<h6 class="fw-normal mb-0">Password changed</h6>
<small>15 minutes ago</small>
</a> */}

{/* <a href="#" class="dropdown-item text-center">See all notifications</a> */}

</div>
</div>


<div class="nav-item dropdown">

<a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">

 {/* <img class="rounded-circle me-lg-2" src="img/user.jpg" alt="" style={{width: "40px", height: "40px"}}/> */}

<span class="d-none d-lg-inline-flex">SAKIN</span>
</a>

<div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">

<a href="#" class="dropdown-item">My Profile</a>
<a href="#" class="dropdown-item">Settings</a>

<a href="#" onClick={() => logOut()} class="dropdown-item">Log Out</a>

{/* <a href="#" onClick="logOut()" class="dropdown-item">Log Out</a> */}

</div>
</div>
</div>
</nav>

  

<Outlet />

{/* <div> hello  </div> */}

<div class="container-fluid">

<div class=" rounded-top p-4" style={{backgroundColor:"lawngreen"}} >

<div class="row">

<div style={{textAlign:"center",fontSize:"x-larger",fontWeight:"bold",color:"blue"}} >

 &copy; XYZ Travels & Tours All Right Reserved.

</div>

    {/* <div class="col-12 col-sm-6 text-center text-sm-end">

     Designed By <a href="https://htmlcodex.com">HTML Codex </a>

     <br/>

     Distributed By <a class="border-bottom" href="https://themewagon.com" target="_blank">ThemeWagon</a>

    </div> */}

</div>
</div>
</div>

</div>



 {/* <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a> */}

</div>


</>






</template>

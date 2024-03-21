<script setup>

 import { ref, computed } from 'vue'
 //import { useRouter } from 'vue-router'
 import HelloWorld from './components/HelloWorld.vue'
 import TheWelcome from './components/TheWelcome.vue'
 

    import WelcomeItem from './components/WelcomeItem.vue'


    // My Project Travels & Tourism // 
     
      import Visitingplaces from './components/Visitingplaces.vue'
      import Flights from './components/Flights.vue'
      import Packages from './components/Packages.vue'
      import Booking from './components/Booking.vue'
      import Feecollection from './components/Feecollection.vue'
      import Searchbooking from './components/Searchbooking.vue'
      import Collectfee from './components/Collectfee.vue'
      import Todayfee from './components/Todayfee.vue'
      import Services from './components/Services.vue'
      import Services2 from './components/Services2.vue'
      import Servicepayment from './components/Servicepayment.vue'
      import Hotelbooking from './components/Hotelbooking.vue'
      import Checkout from './components/Checkout.vue'

      import Floors from './components/Floors.vue'
      import Rooms from './components/Rooms.vue'
       import Home from './home.vue'


    const routes = {
    '/': HelloWorld,
    '/welcome': TheWelcome,
    '/item': WelcomeItem,

    // My Project Travels & Tourism // 


      '/visitingplaces': Visitingplaces,
      '/flights': Flights,
      '/packages': Packages,
      '/booking': Booking,
      '/feecollection':Feecollection,
      '/searchbooking':Searchbooking,
      '/collectfee':Collectfee,
      '/todayfee':Todayfee,
      '/services':Services,
      '/services2':Services2,
      '/servicepayment':Servicepayment,
      '/hotelbooking':Hotelbooking,
      '/checkout':Checkout,


      '/floors':Floors,
      '/rooms':Rooms,
      '/home':Home,
    // 

    }

    const currentPath = ref(window.location.hash)

    window.addEventListener('hashchange', () => {
    currentPath.value = window.location.hash
    })

    const currentView = computed(() => {
     //alert(currentPath.value);
     let s=currentPath.value.slice(1);


      let s2=s.indexOf("?")
      if(s2!=-1)
      s=s.substr(0,s2)
      //alert(s)
      if(s!="/home")
      return routes[ s || '/'] || NotFound

    })

</script>


<script>

export default{
data(){
return {

    // all setData

    // const [items,setData]=useSDtate([]) will be items:[],

}

},

created() {

    // If the Vue instance is created created () hook allows you to add code to be run

    // all useEffect codes in a function. Example: start()/display()

},

methods: {

    // all methods

    logOut(){
    localStorage.clear();
    //alert("gone");

    window.location="#/login";
    window.location.reload();
    
    }

},

computed: {

    // computed functions in Vue 3 are functions that are

    // automatically re-evaluated whenever one of their dependencies changes


},

mounted(){

  // useEffect or useHook codes can be put in mounted or in created


}

}


</script>




  <template>


    <div class="container-fluid position-relative bg-white d-flex p-0">



<div class="sidebar" :style="{width:'234px'}">

<nav class="navbar" :style="{backgroundColor:'bisque'}">

<a href="index.html" class="navbar-brand mx-4 mb-3">

 <h3 class="text-primary"><i class="me-2"></i> ✈️  XYZ <br/> Travels & <br/> Tours 🌍 </h3> <hr/> 

 

</a>


 <!--  <div class="d-flex align-items-center ms-4 mb-4">

<div class="position-relative">
    
<img class="rounded-circle" src={user} alt="" style={{width: "40px", height: "40px"}}/>

<div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>

</div>

<div class="ms-3">
<h6 class="mb-0">Jhon Doe</h6>
<span>Admin</span>
</div>
</div> -->   

<div class="navbar-nav w-100">

 <!-- <a href="index.html" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a> -->  

 <!-- <div class="nav-item dropdown">

 <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Elements</a>

    <div class="dropdown-menu bg-transparent border-0">

    <a href="button.html" class="dropdown-item">Buttons</a>
    <a href="typography.html" class="dropdown-item">Typography</a>
    <a href="element.html" class="dropdown-item">Other Elements</a>

</div>
</div> -->  

 <!-- <a href="#/visitingplaces" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Visiting Places</a>    -->
 <!-- <a href="#/flights" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Flights</a>     -->
 <!-- <a href="#/packages" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Packages</a>   -->


 <!-- <a href="#/category" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Category</a> -->  

<a href="#/booking" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Booking</a>
<!-- <a href="#/feecollection" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Booking Payment</a> -->
<a href="#/searchbooking" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Search Booking </a>
<a href="#/collectfee" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Collect Fee </a>
<a href="#/todayfee" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Today Fee </a>


<a href="#/services" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Services</a>
<a href="#/services2" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Hotel Services </a>
<a href="#/servicepayment" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Service Payment</a>
 <!-- <a href="#/hotels" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Hotels</a> -->   
 <a href="#/rooms" class="nav-item nav-link"><i class="fa fa-th me-2"></i> Hotels Rooms</a> 
 <!-- <a href="#/floors" class="nav-item nav-link"><i class="fa fa-th me-2"></i> Located  Floors</a> -->
<a href="#/hotelbooking" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Hotel Check-In</a>
<a href="#/checkout" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Hotel Check-Out</a>
<!-- <a href="#/checkoutprint" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Check-Out Print</a> -->

<!--<a href="#/vehicles" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Vehicles</a>  -->   
 



 <!-- <a href="#/foods" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Food Menu</a> -->    


   <!-- <a href="/" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Home</a> -->

 
<div class="nav-item dropdown">

<!-- <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Pages</a> -->

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



<div class="content" :style="{backgroundColor:'lightyellow'}" >

<nav class="navbar navbar-expand  sticky-top px-4 py-0" :style="{backgroundColor:'lawngreen'}" >

<a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
<h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
</a>
<a href="#" class="sidebar-toggler flex-shrink-0">
<i class="fa fa-bars"></i>
</a>

<form class="d-none d-md-flex ms-4" :style="{border:'5px solid blue'}" >
<input class="form-control border-0" type="search" placeholder="🔎 Search"/>
</form>

<div class="navbar-nav align-items-center ms-auto">

<div :style="{textAlign:'center'}" >  <h2 :style="{color:'blueviolet'}"> ✈️ 🌍 XYZ Travels & Tours 🛣️🚔 </h2> </div>

<div class="nav-item dropdown">



<div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">



</div>
</div>

<div class="nav-item dropdown">



<div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">



</div>
</div>


<div class="nav-item dropdown">

<a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">

 

 <span class="d-none d-lg-inline-flex">SAKIN</span>
</a>

<div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">

<a href="#" class="dropdown-item">My Profile</a>
<a href="#" class="dropdown-item">Settings</a>

<button v-on:click="logOut()" class="dropdown-item">Log Out</button>



</div>
</div>
</div>
</nav>

  

<component :is="currentView" />



<div class="container-fluid">

<div class=" rounded-top p-4" :style="{backgroundColor:'lawngreen'}" >

<div class="row">

<div :style="{textAlign:'center',fontSize:'x-larger',fontWeight:'bold',color:'blue'}" >

 &copy; XYZ Travels & Tours All Right Reserved.

</div>

    

</div>
</div>
</div>

</div>



 

</div>


  





   </template>






<style scoped>



header {
  line-height: 1.5;
}

.logo {
  display: block;
  margin: 0 auto 2rem;
}

@media (min-width: 1024px) {
  header {
    display: flex;
    place-items: center;
    padding-right: calc(var(--section-gap) / 2);
  }

  .logo {
    margin: 0 2rem 0 0;
  }

  header .wrapper {
    display: flex;
    place-items: flex-start;
    flex-wrap: wrap;
  }
}
</style>

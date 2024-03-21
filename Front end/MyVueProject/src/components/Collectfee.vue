<script setup>

 import { reactive, computed } from 'vue'
 import axios from 'axios'
 defineProps({
 })

</script>

<script>

    export default{
    data(){
    return {
    lineitems: [],
    U:"http://localhost:8000/feecollection",

    ImageU:"http://localhost/VUE JS/MyVueProject",

    index2:"",
    index3:"",
    bno:"",
    dt:"",
    mob:"",
    name:"",
    destination:""
    }
    },
    created() {
    //this.display();
    },

    methods: {
    //self = this,
    display() {
       
    axios.get(`${this.U}/getfeecollections`)
    .then(response => {
    this.lineitems = response.data;
    //alert(this.lineitems)
    return response
    })
    .catch(error => {
    return error
    });

    },

     InsertAmount(){


let b=$("#date2").val();
let c=$("#bookid2").val();
let d=$("#Name3").val();
let e=$("#amount").val();
var today = new Date();
var dd = today.getDate();

var mm = today.getMonth()+1; 
var yyyy = today.getFullYear();
if(dd<10) 
{
    dd='0'+dd;
} 

if(mm<10) 
{
    mm='0'+mm;
} 
today = yyyy+'-'+mm+'-'+dd;

let  url=`${this.U}/insertfeecollection?bookingdate=${b}&bookid=${c}&Name3=${d}&amount=${e}`;

$.get(url,{},function(data){

    window.location=`#/todayfee?today=${today}`
    
    });

},

   useEffect(){
        let urlParams = new URLSearchParams(window.location.search);
        const a = urlParams.get('bookid');
        const b = urlParams.get('date');
        const c = urlParams.get('mobile');
        const d = urlParams.get('name');
        const e = urlParams.get('destination');
        //console.log(myParam)
        $("#bookid").val(a);
        $("#date").val(b);
        //alert(c)
        $("#mobile").val(c);
        $("#Name").val(d);
        $("#chooseDestination").val(e);

         this.display();
},

    

    },
    computed: {




    },
mounted(){

this.originalString=window.location.href;
const index = this.originalString.indexOf('?');
//alert(this.originalString+"  "+index)
this.substring2 = this.originalString.substring(index+1,this.originalString.length);
//alert("substr:  "+this.substring2);

this.index2 = this.substring2.split('&');
//alert(this.index2.length)
for(let a in this.index2){
//alert(this.index2[a])
this.index3 = this.index2[a].split('=');
if(this.index3[0]=="bookid"){
    this.bno=this.index3[1];
}
if(this.index3[0]=="date"){
    this.dt=this.index3[1];
}
if(this.index3[0]=="mobile"){
    this.mob=this.index3[1];
}
if(this.index3[0]=="name"){
    this.name=this.index3[1];
}
if(this.index3[0]=="destination"){
    this.destination=this.index3[1];
}
}
// this.substring3 = this.substring2.substring(index2+1,this.substring2.length);
// alert(this.substring3)


if(this.index2.length==0){
this.start();
}
if(this.index2.length>0){
const myParam = this.substring3;
// //alert(this.substring3);
//alert(this.bno)

$("#date2").val(this.dt);
$("#bookid2").val(this.bno);
$("#Name3").val(this.name);
$("#mobile2").val(this.mob);
$("#chooseDestination2").val(this.destination);
//$("#amount").html(this.bno);

//alert("hetre");
this.useEffect();
}


}
    }

</script>


<template>

<div class="container-fluid" >

<h1 class="text-center" :style="{color:'blue'}"> Booking Payment Entries </h1> 

<div class="row" :style="{textAlign:'center',fontSize:'large'}">
<div class="col-sm-12">

<div class="form-group">
<label for="date" :style="{fontSize:'larger',color:'black'}">Date</label>
<input type="label" id="date2" :style="{border:'5px solid blue',marginLeft:'110px'}" />
</div> <br/>

<div class="form-group">
<label for="bookid" :style="{fontSize:'larger',color:'black'}">Booking ID</label>
<input type="label" id="bookid2" :style="{border:'5px solid blue',marginLeft:'65px'}" />
</div> <br/>

<div class="form-group">
<label for="Name" :style="{fontSize:'larger',color:'black'}">Customer Name</label>
<input type="label" id="Name3" :style="{border:'5px solid blue',marginLeft:'20px'}" />
</div> <br/>

<div class="form-group">
<label for="Number" :style="{fontSize:'larger',color:'black'}">Contact Number</label>
<input type="label" id="mobile2" :style="{border:'5px solid blue',marginLeft:'20px'}" />
</div> <br/>

<div class="form-group">
<label for="chooseDestination" :style="{fontSize:'larger',color:'black'}" >Destination</label>
<input type="label" id="chooseDestination2" :style="{border:'5px solid blue',marginLeft:'50px'}" />
</div> <br/>

<div class="form-group">
<label for="amount" :style="{fontSize:'larger',color:'black'}" >Amount</label>
<input type="text" id="amount" :style="{border:'5px solid blue',marginLeft:'80px'}" />
</div> <br/>

<div class="d-grid gap-2 col-6 mx-auto">

  <button type="button" class="btn btn-success" v-on:click="InsertAmount()" > Collect </button> 

</div>  <br/> <br/>

<div class="form-group">
<div id="action"></div>
</div>
</div>



</div>

</div>
    

</template>

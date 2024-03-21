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
    U:"http://localhost:8000/Todayfee",

    ImageU:"http://localhost/VUE JS/MyVueProject"

    }
    },
    created() {
    this.display();
    },

    methods: {
    //self = this,
    display() {
       
     // some code here lookin previous js file // 
     
    //  const urlParams = new URLSearchParams(window.location.search);
    // const myParam = urlParams.get('today');
    let myParam="";

this.originalString=window.location.href;
const index = this.originalString.indexOf('?');
//alert(this.originalString+"  "+index)
this.substring2 = this.originalString.substring(index+1,this.originalString.length);
//alert("substr:  "+this.substring2);
const index2 = this.substring2.indexOf('=');
this.substring3 = this.substring2.substring(index2+1,this.substring2.length);

//alert(this.substring3)



if(this.substring3==null){
this.start();
}
if(this.substring3!=null){
myParam = this.substring3;

    axios.get(`${this.U}/gettodayfees?today=${myParam}`)
    .then(response => {
    this.lineitems = response.data;
    //alert(this.lineitems)
    return response
    })
    .catch(error => {
    return error
    });
}


    },
   


    work(){
    this.display();

      $("#collectionid").val("");
      $("#date").val("");
      $("#bookid").val("");

      $("#Name").val("");

     $("#amount").val("");


    },

    add(){

        let a=$("#collectionid").val();
        let b=$("#date").val();
        let c=$("#bookid").val();
        let d=$("#Name").val();
        let e=$("#amount").val();

    axios.get(`${this.U}/inserttodayfee?collectionid=${a}&date=${b}&bookid=${c}&Name=${d}&amount=${e}`)
    .then(response => {
    $("#action").html(response.data.total+" records Inserted");
    this.work();
    return response
    })
    .catch(error => {
    return error
    });
    },

    show(a,b,c,d,e){

        $("#collectionid").val(a);
        $("#date").val(b);
        $("#bookid").val(c);
        $("#Name").val(d);
        $("#amount").val(e);

        $("#imgprev").css("display",'block');
        $("#imgprev").attr("src","upload/"+k);

    },

     // For total // 

        collectionTotal(){
            let tot=0;
            for(let t in this.lineitems){
               
                tot+=Number(this.lineitems[t].amount)
            }
            return tot;
        },


    update(){

        let a=$("#collectionid").val();
        let b=$("#date").val();
        let c=$("#bookid").val();
        let d=$("#Name").val();
        let e=$("#amount").val();

    let url=`${this.U}/updatetodayfee?collectionid=${a}&date=${b}&bookid=${c}&Name=${d}&amount=${e}`;
    axios.get(url)
    .then(response => {
    this.work();
    return response
    })
    .catch(error => {
    return error
    });
    },


    remove(i){
    let a=i;
    let url=`${this.U}/deletetodayfee?collectionid=${a}`;
    axios.get(url)
    .then(response => {
    this.work();
    return response
    })
    .catch(error => {
    return error
    });
    },


    },
    computed: {


    },
    mounted(){


    }
    }

</script>


<template>


<div class="container-fluid">

<br/> <h1 class="text-center" :style="{color:'blue'}"> Today  Booking Total Payment Details </h1> <hr/> 

<div class="row">
    
<div class="col-sm-0">

    <div class="form-group">
<div id="action"></div>
</div>
</div>

<div class="col-sm-12">

<table class="table table-bordered" :style="{textAlign:'center',border:'5px solid blue'}">

<thead :style="{color:'black',backgroundColor:'lightgreen'}">

    <th>Collection ID</th>
    <th>Date</th>
    <th>Booking ID</th>
    <th>Customer Name</th>
    <th>Amount ( TK ) </th>
    <th>Action</th>

</thead>

<tbody id="tb" :style="{color:'black',fontSize:'large'}">



 <!--t+=Number(d.amount);-->

    <tr v-for="d in lineitems" v-on:click="show(d.collectionid,d.date,d.bookid,d.Name,d.amount,index)" >

        <td>{{d.collectionid}}</td>

        <td>{{d.date}}</td>

        <td>{{d.bookid}}</td>

        <td>{{d.Name}}</td>
        <td>{{d.amount}}</td>

        <!--<td><img  @error="replaceByDefault" :src="getPic(d.picture)" class="img-fluid"/></td> -->

        <td><button type="button"  class="btn btn-danger btn-lg" v-on:click="remove(d.collectionid)"> Remove  </button></td>

    </tr>


    <tr> 
    
      <td colspan="4"> Total Amount ( TK ) = </td> 
    
       <td> {{ collectionTotal() }} </td>
    
       <td> <button type="button"  class="btn btn-success btn-lg" > Collected </button> </td> 
     
    </tr>

</tbody>

</table>

</div>
</div>

</div>

</template>


<style scoped>


  tr:hover{
          background-color:pink;
      }

      th{
          background-color:lightgreen;

      }

</style>
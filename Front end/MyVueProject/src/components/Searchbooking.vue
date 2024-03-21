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
    items: [], // For function & onclick 
    U:"http://localhost:8000/Booking",

    ImageU:"http://localhost:8000/Booking"

    }
    },
    created() {
    this.display();
    },

    methods: {
    //self = this,
    display() {
       
    axios.get(`${this.U}/getbookings`)
    .then(response => {
    this.lineitems = response.data;
    //alert(this.lineitems)
    return response
    })
    .catch(error => {
    return error
    });

    },

    click1(){

    let d1=$("#d1").val(); //convertDate($("#d1").val());

    let d2=$("#d2").val(); //convertDate($("#d2").val());


 axios.get(`http://localhost:8000/Booking/SearchBooking?d1=${d1}&d2=${d2}`)
.then(data => {
  // alert(JSON.stringify(data.data))
this.items=data.data;//set all data into items. This variable: items will be sent to html by {items.total}
})
.catch(error => {
// Handle the error
});
},

   collectFee(a,b,c,d,f){

   window.location=`#/collectfee?bookid=${a}&date=${b}&mobile=${c}&name=${d}&destination=${f}`;

  },
   

  Clickheretoprint()
{
  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,";
  disp_setting+="scrollbars=yes,width=700, height=400, left=100, top=25";
  var content_vlue = document.getElementById("content").innerHTML;

  var docprint="";
  docprint=window.open("","",disp_setting);
  docprint.document.open();
  docprint.document.write('</head><body onLoad="self.print()" style="width: 700px; font-size:11px; font-family:arial; font-weight:normal;">');
  docprint.document.write(content_vlue);
  docprint.document.close();
  docprint.focus();

},




  
    },
    computed: {




    },
    mounted(){


    }
    }

</script>


<template>


<div className="container-fluid">


<div :style="{marginTop: '-19px', marginBottom: '21px'}">
<a  href="index.php"><button class="btn btn-primary btn-lg" :style="{float: 'none'}">  Back</button>
<button  type="button" :style="{float:'right'}" class="btn btn-success btn-lg" v-on:click="Clickheretoprint()" > Print</button></a>
</div>
<form>
<br/> <h1 :style="{textAlign:'center',color:'blue'}"> 🔎 💁‍♂️ Search Booking 📝 👨‍💻 </h1> 

<div :style="{textAlign: 'center'}">
  
<strong>


<br/>
<br/>
<b>From :</b> <input type="date" :style="{width: '223px', padding:'14px',color:'black'}" id="d1" name="d1" className="tcal"  />
<b>To:</b> <input type="date" :style="{width: '223px', padding:'14px',color:'black'}"  id="d2" name="d2" className="tcal"  />
<button class="btn btn-info" :style="{width: '123px', height:'35px', marginTop:'-8px',marginLeft:'8px'}" type="button" v-on:click="click1()" > Search</button>
</strong></div>
</form>


<div class="content" id="content" :style="{textAlign:'center'}">

<div :style="{fontWeight:'bold', textAlign:'center',fontSize:'14px',marginBottom: '15px'}">

</div> <br/> 


<table class="table table-bordered" id="resultTable" data-responsive="table" :style="{textAlign: 'center',border:'5px solid blue'}">

<thead :style="{color:'black',backgroundColor:'lightgreen'}">

  <tr>

    <th width="10%"> Book ID </th>
    <th width="10%"> Date </th>
    <th width="10%"> Contact Number </th>
    <th width="10%"> Customer Name </th>
    <th width="10%"> Destination </th>
    <th width="10%"> Action </th>


  </tr>

</thead>

<tbody :style="{color:'black',fontSize:'large'}">


  <tr className="record" v-for="item in items">
    
    <td>{{item.bookid}}</td>
    <td>{{item.date}}</td>
    <td>{{item.Number}}</td>
    <td>{{item.Name}}</td>
    <td>{{item.chooseDestination}}</td>

    <td><button type="button"  class="btn btn-success btn-md" v-on:click="collectFee(item.bookid,item.date,item.Number,item.Name,item.chooseDestination)" > Collect Fee </button></td>

  </tr>

</tbody>

</table>
</div>

</div>

</template>



<style scoped>


  tr:hover{
          background-color: pink;
      }

      th{
          background-color:lightgreen;

      }

</style>
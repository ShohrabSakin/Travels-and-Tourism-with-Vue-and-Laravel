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
    U:"http://localhost:8000/Flights",

    ImageU:"http://localhost/VUE JS/MyVueProject"

    }
    },
    created() {
    this.display();
    },

    methods: {
    //self = this,
    display() {
       
    axios.get(`${this.U}/getflights`)
    .then(response => {
    this.lineitems = response.data;
    //alert(this.lineitems)
    return response
    })
    .catch(error => {
    return error
    });

    },
    replaceByDefault(e) {
    e.target.src = "./public/upload/logo.png"
    },


    work(){
    this.display();

        $("#bookid").val("");
        $("#pkgid").val("");
        $("#type").val("");
        $("#Name").val("");
        $("#Number").val("");

        // $("#picture").val("");

        $("#NID").val("");
        $("#chooseGuests").val("");
        $("#date").val("");
        $("#chooseDestination").val("");


    },

    add(){

        let a=$("#flightid").val();
        let b=$("#fromwhere").val();
        let c=$("#towhere").val();
        let d=$("#fromdate").val();
        let e=$("#todate").val();
        let f=$("#price").val();

    axios.get(`${this.U}/insertflights?flightid=${a}&fromwhere=${b}&towhere=${c}&fromdate=${d}&todate=${e}&price=${f}`)
    .then(response => {
    $("#action").html(response.data.total+" records Inserted");
    this.work();
    return response
    })
    .catch(error => {
    return error
    });
    },

    show(a,b,c,d,e,f){

        $("#flightid").val(a);
        $("#fromwhere").val(b);
        $("#towhere").val(c);

        $("#fromdate").val(d);
        $("#todate").val(e);
        $("#price").val(f);

        $("#imgprev").css("display",'block');
        $("#imgprev").attr("src","upload/"+k);

    },


    update(){

        let a=$("#flightid").val();
        let b=$("#fromwhere").val();
        let c=$("#towhere").val();
        let d=$("#fromdate").val();
        let e=$("#todate").val();
        let f=$("#price").val();

    let url=`${this.U}/updateflights?flightid=${a}&fromwhere=${b}&towhere=${c}&fromdate=${d}&todate=${e}&price=${f}`;
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
    let url=`${this.U}/deleteflights?flightid=${a}`;
    axios.get(url)
    .then(response => {
    this.work();
    return response
    })
    .catch(error => {
    return error
    });
    },


    upload(){
    var fd = new FormData();

    var files = $('#file')[0].files;

    // Check file selected or not
    if(files.length > 0 ){

    fd.append('file',files[0]);

    $.ajax({
    url:this.U+'/upload.php',
    type:'post',
    data:fd,
    dataType: 'json',
    contentType: false,
    processData: false,
    success:function(response){
    if(response.status == 1){
    alert(JSON.stringify(response.name))
    var extension = response.extension;
    var path = response.path;
    $("#picture").val(response.name);
    $('.prevel').hide();
    if(extension == 'pdf' || extension == 'docx'){
    $("#fileprev").attr("href",path);
    $("#fileprev").show();
    }else{
    $("#imgprev").attr("src",path);
    $("#imgprev").show();
    }

    }else{
    alert('File not uploaded');
    }
    }
    });
    }else{
    alert("Please select a file.");
    }

    },
    onFileChange(event){
    //alert("here")
    let status = false
    const file = event.target.files[0];
    //alert(file.name)
    status = event.target.files.length>0?true:false
    if(status==true){
    const reader = new FileReader();
    reader.readAsDataURL(file);
    reader.onload = () => {
    $("#imgprev").css("display",'block');
    document.getElementById("imgprev").src=reader.result;

    }
    }
    },
    getPic(name) {
    return this.ImageU+"/upload/"+name
    }
    },
    computed: {




    },
    mounted(){


    }
    }

</script>


<template>


<div class="container-fluid">


    <br/>   <h1 class="text-center" :style="{color:'blue'}"> ✈ Flights Details 📝 </h1> <hr/> 

<div class="row">
<div class="col-sm-2" :style="{color:'black',fontWeight:'bold'}" >

<div class="form-group">
<label for="flightid">Flight ID</label>
<input type="text" id="flightid" class="form-control"/>
</div> <br/>

<div class="form-group">
<label for="fromwhere">From Where</label>
<input type="text" id="fromwhere" class="form-control"/>
</div> <br/>

<div class="form-group">
<label for="towhere">To Where</label>
<input type="text" id="towhere" class="form-control"/>
</div> <br/>

<div class="form-group">
<label for="fromdate">From Date</label>
<input type="date" id="fromdate" class="form-control"/>
</div> <br/>

<div class="form-group">
<label for="todate">To Date</label>
<input type="date" id="todate" class="form-control"/>
</div> <br/>

<div class="form-group">
<label for="price">Price</label>
<input type="text" id="price" class="form-control"/>
</div> <br/>

<div class="form-group">
<div class="btn-group" role="group" aria-label="Basic mixed styles example">

<button type="button" class="btn btn-success" v-on:click="add()" >Add</button>

<button type="button" class="btn btn-info" v-on:click="update()" >Update</button>

</div>
</div>
<div class="form-group">
<div id="action"></div>
</div>
</div>

<div class="col-sm-10">

    <table class="table table-bordered" :style="{textAlign:'center',border:'5px solid blue'}" >



<thead :style="{color:'black',backgroundColor:'lightgreen'}" >

<th>Flights ID</th>

<th>From Where</th>

<th>To Where</th>
<th>From Date</th>
<th>To Date</th>

<th>Price</th>

<th>Action</th>

</thead>

<tbody id="tb" :style="{color:'black',fontSize:'large'}" >



 <tr v-for="d in lineitems" v-on:click="show(d.flightid,d.fromwhere,d.towhere,d.fromdate,d.todate,d.price,index)" >

<td>{{d.flightid}}</td>

<td>{{d.fromwhere}}</td>

<td>{{d.towhere}}</td>

<td>{{d.fromdate}}</td>
<td>{{d.todate}}</td>

<td>{{d.price}}</td>


<!--<td><img  @error="replaceByDefault" :src="getPic(d.picture)" class="img-fluid"/></td> -->

<td><button type="button"  class="btn btn-success" v-on:click="remove(d.flightid)" > Available  </button></td>

</tr>



</tbody>

</table>

</div>
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
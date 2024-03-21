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
    U:"http://localhost:8000/Packages",

    ImageU:"http://localhost/VUE JS/MyVueProject"

    }
    },
    created() {
    this.display();
    },

    methods: {
    //self = this,
    display() {
       
    axios.get(`${this.U}/getpackages`)
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

    $("#pkgid").val("");
    $("#pkgname").val("");
    $("#destination").val("");
    $("#duration").val("");
    $("#price").val("");

    $("#picture").val("");

    $("#type").val("");
    $("#fromwhere").val("");
    $("#towhere").val("");
    $("#fromdate").val("");
    $("#todate").val("");


    },

    add(){

        
        let a=$("#pkgid").val();
        let b=$("#pkgname").val();
        let c=$("#destination").val();
        let d=$("#duration").val();
        let f=$("#price").val();
        let g=$("#picture").val();

        let h=$("#type").val();
        let i=$("#fromwhere").val();
        let j=$("#towhere").val();
        let k=$("#fromdate").val();
        let l=$("#todate").val();

    axios.get(`${this.U}/insertpackages?pkgid=${a}&pkgname=${b}&destination=${c}&duration=${d}&price=${f}&picture=${g}&type=${h}&fromwhere=${i}&towhere=${j}&fromdate=${k}&todate=${l}`)
    .then(response => {
    $("#action").html(response.data.total+" records Inserted");
    this.work();
    return response
    })
    .catch(error => {
    return error
    });
    },

    show(a,b,c,d,f,g,h,i,j,k,l){

        $("#pkgid").val(a);
        $("#pkgname").val(b);
        $("#destination").val(c);
        $("#duration").val(d);
        $("#price").val(f);
        $("#picture").val(g);

        $("#type").val(h);
        $("#fromwhere").val(i);
        $("#towhere").val(j);
        $("#fromdate").val(k);
        $("#todate").val(l);

        $("#imgprev").css("display",'block');
        $("#imgprev").attr("src","upload/"+k);

    },


    update(){

        let a=$("#pkgid").val();
        let b=$("#pkgname").val();
        let c=$("#destination").val();
        let d=$("#duration").val();
        let f=$("#price").val();
        let g=$("#picture").val();

        let h=$("#type").val();
        let i=$("#fromwhere").val();
        let j=$("#towhere").val();
        let k=$("#fromdate").val();
        let l=$("#todate").val();

    let url=`${this.U}/updatepackages?pkgid=${a}&pkgname=${b}&destination=${c}&duration=${d}&price=${f}&picture=${g}&type=${h}&fromwhere=${i}&towhere=${j}&fromdate=${k}&todate=${l}`;
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
    let url=`${this.U}/deletepackages?pkgid=${a}`;
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

    <br/>   <h1 class="text-center" :style="{color:'blue'}"> 🏛 🏦 Our Packages 🏫 🏨 </h1> <hr/> 

<div class="row">
<div class="col-sm-2"  :style="{color:'black',fontWeight:'bold'}">

<div class="form-group">
<label for="pkgid">Package ID</label>
<input type="text" id="pkgid" class="form-control"/>
</div> <br/>

<div class="form-group">
<label for="pkgname">Packages</label>
<input type="text" id="pkgname" class="form-control"/>
</div> <br/>

<div class="form-group">
<label for="destination">Destination</label>
<input type="text" id="destination" class="form-control"/>
</div> <br/>

<div class="form-group">
<label for="duration">Duration</label>
<input type="text" id="duration" class="form-control"/>
</div> <br/>

<div class="form-group">
<label for="price">Price</label>
<input type="text" id="price" class="form-control"/>
</div> <br/>

<div class="form-group">
<label for="type">Type</label>
<input type="text" id="type" class="form-control"/>
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
<input type="file" id="file" name="file" @change="onFileChange($event)"  />

<input type="hidden" id="picture" />

<input type="button" class="button" value="Upload" id="but_upload" v-on:click="upload()"/>

<hr/>

<div :style="{marginTop: '40px'}"  >


<img src="" class="prevel img-fluid" id="imgprev" width="300" :style="{display: 'none'}" />


<a href="#" target="_blank" class="prevel" id="fileprev" :style="{display: 'none'}" >View File</a>
</div>
</div>


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

<table class="table table-bordered" :style="{textAlign:'center',border:'5px solid blue'}">



<thead :style="{color:'black',backgroundColor:'lightgreen'}">

<th>Package ID</th>
<th>Packages</th>
 <th>Destination</th> 
 <th>Duration</th> 
<th>Price</th>
<th>Picture</th>

<!-- <th>Type</th>

<th>From Where</th>
<th>To Where</th>
<th>From Date</th>
<th>To Date</th> -->

<th>Action</th>

</thead>

<tbody id="tb" :style="{color:'black',fontSize:'large'}">

 <tr v-for="d in lineitems" v-on:click="show(d.pkgid,d.pkgname,d.destination,d.duration,d.price,d.picture,d.type,d.fromwhere,d.towhere,d.fromdate,d.todate,index)"  >
<td>{{d.pkgid}}</td>
<td>{{d.pkgname}}</td>
<td>{{d.destination}}</td> 
 <td>{{d.duration}}</td> 
<td>{{d.price}}</td>
<td><img  @error="replaceByDefault" :src="getPic(d.picture)" class="img-fluid"/></td>

<!-- <td>{{d.type}}</td>
<td>{{d.fromwhere}}</td>
<td>{{d.towhere}}</td>
<td>{{d.fromdate}}</td>
<td>{{d.todate}}</td> -->

<!-- <td>{{d.Details}}</td>
<td>{{d.Amount}}</td>  -->

<td><button type="button"  class="btn btn-success" v-on:click="remove(d.pkgid)" >  Available </button></td>

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
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
    U:"http://localhost:8000/Hotelbooking",

    ImageU:"http://localhost/VUE JS/MyVueProject"

    }
    },
    created() {
    this.display();
    },

    methods: {
    //self = this,
    display() {
       
    axios.get(`${this.U}/gethotelbookings`)
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
    $("#date").val("");
    $("#fromdate").val("");
    $("#todate").val("");
    $("#name").val("");
    $("#guardian").val("");
    $("#nid").val("");
    $("#address").val("");
    $("#mobile").val("");
    $("#roomno").val("");
    $("#regid").val("");
    $("#picture").val("");


    },

    add(){

        let a=$("#bookid").val();
        let b=$("#date").val();
        let c=$("#fromdate").val();
        let d=$("#todate").val();
        let e=$("#name").val();
        let f=$("#guardian").val();
        let g=$("#nid").val();
        let h=$("#address").val();
        let i=$("#mobile").val();
        let j=$("#roomno").val();
        let k=$("#regid").val();
        let l=$("#picture").val();

    axios.get(`${this.U}/inserthotelbooking?bookid=${a}&date=${b}&fromdate=${c}&todate=${d}&name=${e}&guardian=${f}&nid=${g}&address=${h}&mobile=${i}&roomno=${j}&regid=${k}&picture=${l}`)
    .then(response => {
    $("#action").html(response.data.total+" records Inserted");
    this.work();
    return response
    })
    .catch(error => {
    return error
    });
    },

    show(a,b,c,d,e,f,g,h,i2,j,k,l){
        $("#bookid").val(a);
        $("#date").val(b);
        $("#fromdate").val(c);
        $("#todate").val(d);
        $("#name").val(e);
        $("#guardian").val(f);
        $("#nid").val(g);
        $("#address").val(h);
        $("#mobile").val(i2);
        $("#roomno").val(j);
        $("#regid").val(k);
        $("#picture").val(l);

        $("#imgprev").css("display",'block');
        $("#imgprev").attr("src","upload/"+k);

    },


    update(){

        let a=$("#bookid").val();
        let b=$("#date").val();
        let c=$("#fromdate").val();
        let d=$("#todate").val();
        let e=$("#name").val();
        let f=$("#guardian").val();
        let g=$("#nid").val();
        let h=$("#address").val();
        let i=$("#mobile").val();
        let j=$("#roomno").val();
        let k=$("#regid").val();
        let l=$("#picture").val();

    let url=`${this.U}/updatehotelbooking?bookid=${a}&date=${b}&fromdate=${c}&todate=${d}&name=${e}&guardian=${f}&nid=${g}&address=${h}&mobile=${i}&roomno=${j}&regid=${k}&picture=${l}`;
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
    let url=`${this.U}/deletehotelbooking?bookid=${a}`;
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

<br/>   <h1 class="text-center" :style="{color:'blue'}"> 👨‍💻 Hotel Booking / Check-In Information 📝 </h1> <hr/> 

<div class="row">
<div class="col-sm-2" :style="{color:'black',fontWeight:'bold'}">

<div class="form-group">
<label for="bookid">Booking ID</label>
<input type="text" id="bookid" class="form-control"/>
</div> <br/>

<div class="form-group">
<label for="date">Booking Date</label>
<input type="date" id="date" class="form-control"/>
</div> <br/>

<div class="form-group">
<label for="fromdate"> From Date </label>
<input type="date" id="fromdate" class="form-control"/>
</div> <br/>

<div class="form-group">
<label for="todate"> To Date </label>
<input type="date" id="todate" class="form-control"/>
</div> <br/>

<div class="form-group">
<label for="name"> Customer Name </label>
<input type="text" id="name" class="form-control"/>
</div> <br/>

<div class="form-group">
<label for="guardian"> Guardian </label>
<input type="text" id="guardian" class="form-control"/>
</div> <br/>

<!-- <div class="form-group">
<label for="nid">NID</label>
<input type="number" id="nid" class="form-control"/>
</div> -->

<div class="form-group">
<label for="address">Address</label>
<input type="text" id="address" class="form-control"/>
</div> <br/>

<div class="form-group">
<label for="mobile">Contact Number</label>
<input type="text" id="mobile" class="form-control"/>
</div> <br/>

<div class="form-group">
<label for="roomno">Room Number</label>
<input type="text" id="roomno" class="form-control"/>
</div> <br/>

<!-- <div class="form-group">
<label for="regid">Registration ID</label>
<input type="text" id="regid" class="form-control"/>
</div> -->

<!-- <div class="form-group">
<label for="picture">Picture</label>
<input type="text" id="picture" class="form-control"/>
</div> -->


<!-- <div class="form-group">

<input type="file" id="file" name="file" @change="onFileChange($event)"  />

<input type="hidden" id="picture" />

<input type="button" class="button" value="Upload" id="but_upload" v-on:click="upload()"/>

<hr/>

<div :style="{marginTop: '40px'}"  >


<img src="" class="prevel img-fluid" id="imgprev" width="300" :style="{display: 'none'}" />


<a href="#" target="_blank" class="prevel" id="fileprev" :style="{display: 'none'}" >View File</a>
</div>
</div> -->


<div class="form-group">

<div class="btn-group" role="group" aria-label="Basic mixed styles example">

<button type="button" class="btn btn-success btn-lg" v-on:click="add()" >Add</button>

<button type="button" class="btn btn-info btn-lg" v-on:click="update()" >Update</button> 

</div>
</div> <br/>

<div class="form-group">
<div id="action"></div>
</div>
</div>

<div class="col-sm-10">

<table class="table table-bordered" :style="{textAlign:'center',border:'5px solid blue'}">



<thead :style="{color:'black',backgroundColor:'lightgreen'}">

<th>Booking ID</th>
<th>Booking Date</th>
<th>From Date</th>
<th> To Date </th>
<th> Customer Name </th>
<th> Guardian </th>
<!-- <th> NID </th> -->
<th> Address </th>
<th> Contact No. </th>
<th> Room No. </th>
<!-- <th> Registration ID </th> -->
<!-- <th> Picture </th> -->

<th>Booking Status </th>


</thead>

<tbody id="tb" :style="{color:'black',fontSize:'large'}">

 <tr v-for="d in lineitems" v-on:click="show(d.bookid,d.date,d.fromdate,d.todate,d.name,d.guardian,d.nid,d.address,d.mobile,d.roomno,d.regid,d.picture,index)"  >

<td>{{d.bookid}}</td>

<td>{{d.date}}</td>

 <td>{{d.fromdate}}</td>

<td>{{d.todate}}</td>
<td>{{d.name}}</td>
<td>{{d.guardian}}</td>
<!-- <td>{{d.nid}}</td> -->
<td>{{d.address}}</td>
<td>{{d.mobile}}</td>
<td>{{d.roomno}}</td>
<!-- <td>{{d.regid}}</td> -->

 <!-- <td><img  @error="replaceByDefault" :src="getPic(d.picture)" class="img-fluid"/></td> -->

<td><button type="button"  class="btn btn-success" v-on:click="remove(d.bookid)" > Successful </button></td>

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
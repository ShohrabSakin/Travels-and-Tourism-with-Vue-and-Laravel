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
    U:"http://localhost:8000/Rooms",

    ImageU:"http://localhost/VUE JS/MyVueProject"

    }
    },
    created() {
    this.display();
    },

    methods: {
    //self = this,
    display() {
       
    axios.get(`${this.U}/getrooms`)
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

    $("#roomno").val("");
    $("#floorid").val("");
    $("#title").val("");
    $("#price").val("");
    $("#picture").val("");


    },

    add(){

        let a=$("#roomno").val();
        let b=$("#floorid").val();
        let c=$("#title").val();
        let d=$("#price").val();
        let e=$("#picture").val();

    axios.get(`${this.U}/insertrooms?roomno=${a}&floorid=${b}&title=${c}&price=${d}&picture=${e}`)
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
        $("#roomno").val(a);
        $("#floorid").val(b);
        $("#title").val(c);
        $("#price").val(d);
        $("#picture").val(e);

        $("#imgprev").css("display",'block');
        $("#imgprev").attr("src","upload/"+k);

    },


    update(){

        let a=$("#roomno").val();
        let b=$("#floorid").val();
        let c=$("#title").val();
        let d=$("#price").val();
        let e=$("#picture").val();

    let url=`${this.U}/updaterooms?roomno=${a}&floorid=${b}&title=${c}&price=${d}&picture=${e}`;
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
    let url=`${this.U}/deleterooms?roomno=${a}`;
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

<br/>   <h1 class="text-center" :style="{color:'blue'}">  Rooms Details Information 📝 </h1> <hr/> 

<div class="row">
<div class="col-sm-3" :style="{color:'black',fontWeight:'bold'}">

<div class="form-group">
<label for="roomno">Room Number</label>
<input type="text" id="roomno" class="form-control"/>
</div>   <br/>

<div class="form-group">
<label for="floorid"> Floor  ID </label>
<input type="text" id="floorid" class="form-control"/>
</div>   <br/>

<div class="form-group">
<label for="title"> Title </label>
<input type="text" id="title" class="form-control"/>
</div>   <br/>

<div class="form-group">
<label for="price"> Price</label>
<input type="text" id="price" class="form-control"/>
</div>   <br/>

<div class="form-group">
<label for="picture">Picture</label>
<input type="text" id="picture" class="form-control"/>
</div>   <br/>



<div class="form-group">

<input type="file" id="file" name="file" @change="onFileChange($event)"  />

<input type="hidden" id="picture" />

<input type="button" class="button" value="Upload" id="but_upload" v-on:click="upload()"  />

<hr/>

<div :style="{marginTop: '40px'}" >


<img src="" class="prevel img-fluid" id="imgprev" width="300" :style="{display: 'none'}" />


<a href="#" target="_blank" class="prevel" id="fileprev" :style="{display: 'none'}">View File</a>
</div>
</div>


<div class="form-group">

<div class="btn-group" role="group" aria-label="Basic mixed styles example">

<button type="button" class="btn btn-success btn-lg" v-on:click="add()" >Add</button>

<button type="button" class="btn btn-info btn-lg" v-on:click="update()"  >Update</button>

</div>
</div>

<div class="form-group">
<div id="action"></div>
</div>
</div>

<div class="col-sm-9">

<table class="table table-bordered" :style="{textAlign:'center',border:'5px solid blue'}">



<thead :style="{color:'black',backgroundColor:'lightgreen'}">

<th>Room Number </th>

<th>Floor ID</th>

<th>Title</th>


<th> Price </th>
<th> Picture </th>


<th> Status </th>


</thead>

<tbody id="tb" :style="{color:'black',fontSize:'large'}">

<tr v-for="d in lineitems" v-on:click="show(d.roomno,d.floorid,d.title,d.price,d.picture,index)"  >

<td>{{d.roomno}}</td>

<td>{{d.floorid}}</td>

 <td>{{d.title}}</td>


<td>{{d.price}}</td>


 <td><img  @error="replaceByDefault" :src="getPic(d.picture)" class="img-fluid"/></td>

<td><button type="button"  class="btn btn-success" v-on:click="remove(d.roomno)"  > Available </button></td>

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
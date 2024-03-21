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
    U:"http://localhost:8000/Services2",

    ImageU:"http://localhost/VUE JS/MyVueProject"

    }
    },
    created() {
    this.display();
    },

    methods: {
    //self = this,
    display() {
       
    axios.get(`${this.U}/getServices2`)
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

    $("#id").val("");
    $("#name").val("");
    $("#description").val("");
    $("#price").val("");


    },

    add(){

        let a=$("#id").val();
        let b=$("#name").val();
        let c=$("#description").val();
        let d=$("#price").val();

    axios.get(`${this.U}/insertServices2?id=${a}&name=${b}&description=${c}&price=${d}`)
    .then(response => {
    $("#action").html(response.data.total+" records Inserted");
    this.work();
    return response
    })
    .catch(error => {
    return error
    });
    },

    show(a,b,c,d){

        $("#id").val(a);
        $("#name").val(b);
        $("#description").val(c);
        $("#price").val(d);

        $("#imgprev").css("display",'block');
        $("#imgprev").attr("src","upload/"+k);

    },


    update(){

        let a=$("#id").val();
        let b=$("#name").val();
        let c=$("#description").val();
        let d=$("#price").val();

    let url=`${this.U}/updateServices2?id=${a}&name=${b}&description=${c}&price=${d}`;
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
    let url=`${this.U}/deleteServices2?id=${a}`;
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

<br/>   <h1 class="text-center" :style="{color:'blue'}"> 💁‍♂️ Our Services 📝 </h1> <hr/> 

<div class="row">
<div class="col-sm-3" :style="{color:'black',fontWeight:'bold'}">

<div class="form-group">
<label for="id">Service ID</label>
<input type="text" id="id" class="form-control"/>
</div> <br/>

<div class="form-group">
<label for="name"> Service Name </label>
<input type="text" id="name" class="form-control"/>
</div> <br/>

<div class="form-group">
<label for="description"> Description </label>
<input type="text" id="description" class="form-control"/>
</div> <br/>

<div class="form-group">
<label for="price"> Price</label>
<input type="text" id="price" class="form-control"/>
</div> <br/>



<div class="form-group">
<div id="action"></div>
</div>
</div>

<div class="col-sm-9">

<table class="table table-bordered" :style="{textAlign:'center',border:'5px solid blue'}">

<!-- <caption>Total Rows: <span id="tot">{items.total}</span></caption> -->   

<thead :style="{color:'black',backgroundColor:'lightgreen'}">

<th>Service ID</th>

<th>Service Name</th>

<th>Description</th>

<th> Price </th>

<th> Status </th>

</thead>

<tbody id="tb" :style="{color:'black',fontSize:'large'}">

 <tr v-for="d in lineitems" v-on:click="show(d.id,d.name,d.description,d.price,index)" >

<td>{{d.id}}</td>

<td>{{d.name}}</td>

 <td>{{d.description}}</td>


<td>{{d.price}}</td>



<!--<td><img  @error="replaceByDefault" :src="getPic(d.picture)" class="img-fluid"/></td> -->  

<td><button type="button"  class="btn btn-success btn-lg" v-on:click="remove(d.id)"  > Available </button></td>

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
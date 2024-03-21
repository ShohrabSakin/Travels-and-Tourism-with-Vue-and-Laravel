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
    U:"http://localhost:8000/Feecollection",

    ImageU:"http://localhost/VUE JS/MyVueProject"

    }
    },
    created() {
    this.display();
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
    replaceByDefault(e) {
    e.target.src = "./public/upload/logo.png"
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

    axios.get(`${this.U}/insertfeecollection?collectionid=${a}&date=${b}&bookid=${c}&Name=${d}&amount=${e}`)
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


    update(){

        let a=$("#collectionid").val();
        let b=$("#date").val();
        let c=$("#bookid").val();
        let d=$("#Name").val();
        let e=$("#amount").val();

    let url=`${this.U}/updatefeecollection?collectionid=${a}&date=${b}&bookid=${c}&Name=${d}&amount=${e}`;
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
    let url=`${this.U}/deletefeecollection?collectionid=${a}`;
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

<br/> <h1 class="text-center" :style="{color:'blue'}"> Client Booking Payment Details </h1> <hr/> 

<div class="row">
<div class="col-sm-0">

 <!--<div class="form-group">
<label for="collectionid">Collection ID</label>
<input type="text" id="collectionid" class="form-control"/>
</div>

<div class="form-group">
<label for="date">Date</label>
<input type="date" id="date" class="form-control"/>
</div>

<div class="form-group">
<label for="bookid">Booking ID </label>
<input type="text" id="bookid" class="form-control"/>
</div>

<div class="form-group">
<label for="Name">Customer Name</label>
<input type="text" id="Name" class="form-control"/>
</div>

<div class="form-group">
<label for="amount">Amount</label>
<input type="text" id="amount" class="form-control"/>
</div>  -->   

 <!-- <div class="form-group">
<label for="price">Price</label>
<input type="text" id="price" class="form-control"/>
</div> -->  

 <!-- <div class="form-group">
<label for="Amount">Amount</label>
<input type="number" id="Amount" class="form-control"/>
</div>  --> 

<!--<div class="form-group">

<input type="file" id="file" name="file" onChange={(event)=>onFileChange(event)} />

<input type="hidden" id="picture" />

<input type="button" class="button" value="Upload" id="but_upload" onClick={()=>upload()}/>

<hr/>

<div style={{marginTop: "40px"}} >


<img src="" class="prevel img-fluid" id="imgprev" width="300" style={{display: "none"}} />


<a href="#" target="_blank" class="prevel" id="fileprev" style={{display: "none"}}>View File</a>
</div>
</div>  -->   


 <!-- <div class="form-group">
<div class="btn-group" role="group" aria-label="Basic mixed styles example">

<button type="button" class="btn btn-success" onClick={()=>add()}>Add</button>

<button type="button" class="btn btn-info" onClick={()=>update()}>Update</button>

</div>
</div> --> 

<div class="form-group">
<div id="action"></div>
</div>
</div>

<div class="col-sm-12">

<table class="table table-bordered" :style="{textAlign:'center',border:'5px solid blue'}">

 <!-- <caption>Total Rows: <span id="tot">{items.total}</span></caption> --> 

<thead :style="{color:'black',backgroundColor:'lightgreen'}">

<th>Collection ID</th>

<th>Date</th>

<th>Booking ID</th>
<th>Customer Name</th>
<th>Amount</th>



<th>Status</th>

</thead>

<tbody id="tb" :style="{color:'black',fontSize:'large'}">

 <tr v-for="d in lineitems" v-on:click="show(d.collectionid,d.date,d.bookid,d.Name,d.amount,index)" >

<td>{{d.collectionid}}</td>

<td>{{d.date}}</td>

<td>{{d.bookid}}</td>

<td>{{d.Name}}</td>
<td>{{d.amount}}</td>




<!--<td><img  @error="replaceByDefault" :src="getPic(d.picture)" class="img-fluid"/></td> -->

<td><button type="button"  class="btn btn-success btn-lg" v-on:click="remove(d.collectionid)"  > Confirm  </button></td>

</tr>



</tbody>

</table>

</div>
</div>

</div>
     

</template>


<style scoped>


  tr:hover{
          background-color: yellow;
      }

      th{
          background-color:lightgreen;

      }

</style>
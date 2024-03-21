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
    bookid: [],  // Dropdown Code
    bookdetails: [],  
    servicename: [], // Dropdown Code

    globalvariables:{
      st: [],
      index: 0
    }, 

    U:"http://localhost:8000/Servicepayment",

    ImageU:"http://localhost/VUE JS/MyVueProject"

    }
    },
    created() {
    this.start();
    },

    methods: {
    start(){

    let myParam="";

  this.originalString=window.location.href;
  const index = this.originalString.indexOf('?');
  //alert(this.originalString+"  "+index)
  this.substring2 = this.originalString.substring(index+1,this.originalString.length);
  //alert("substr:  "+this.substring2);
  const index2 = this.substring2.indexOf('=');
  this.substring3 = this.substring2.substring(index2+1,this.substring2.length);

  //alert(this.substring3)

},

    //self = this,
    display() {
       
      // <--  Dropdown Code  ----> // 
      // alert(`${this.U}/getservicepayments`)
       axios.get(`${this.U}/getservicepayments`)

       .then(response => {

       this.globalvariables.st=response.data;
       this.items=response.data;
       this.lineitems=this.globalvariables.st;

      return response
    });
    

      // <--  Dropdown Code  ----> // 
      axios.get(`${this.U}/gethotelbookid`)
          .then(response => {

            this.bookid=response.data;

          return response
    });


         // <--  Dropdown Code  ----> // 
         axios.get(`${this.U}/getservicename`)
              .then(response => {

                this.servicename=response.data;

              return response
      });
    },
      // Dropdown code --> // 

         change1(){

         let ic=$("#bookid").val();

          axios.get(`http://localhost:8000/Servicepayment/getrecordsfrombookid?bookid=${ic}`)
          .then(data => {   
          this.bookdetails=data.data;
          
          })
          .catch(error => {
          });
          
          },
 
    


    replaceByDefault(e) {
    e.target.src = "./public/upload/logo.png"
    },


    work(){
    this.display();

    $("#serviceid").val("");
    $("#date").val("");
    $("#bookid").val("");
    $("#regid").val("");
    $("#roomno").val("");
    $("#servname").val("");
    $("#price").val("");


    },

    add(){

        let a=$("#serviceid").val();
        let b=$("#date").val();
        let c=$("#bookid").val();
        let d=$("#regid").val();
        let e=$("#roomno").val();
        let f=$("#servname").val();
        let g=$("#price").val();

    axios.get(`${this.U}/insertservicepayment?serviceid=${a}&date=${b}&bookid=${c}&regid=${d}&roomno=${e}&servicename=${f}&price=${g}`)
    .then(response => {
    $("#action").html(response.data.total+" records Inserted");
    this.work();
    return response
    })
    .catch(error => {
    return error
    });
    },

    show(a,b,c,d,e,f,g){
        $("#serviceid").val(a);
        $("#date").val(b);
        $("#bookid").val(c);
        $("#regid").val(d);
        $("#roomno").val(e);
        $("#servname").val(f);
        $("#price").val(g);

        $("#imgprev").css("display",'block');
        $("#imgprev").attr("src","upload/");

        change1();

    },


    update(){

        let a=$("#serviceid").val();
        let b=$("#date").val();
        let c=$("#bookid").val();
        let d=$("#regid").val();
        let e=$("#roomno").val();
        let f=$("#servname").val();
        let g=$("#price").val();

    let url=`${this.U}/updateservicepayment?serviceid=${a}&date=${b}&bookid=${c}&regid=${d}&roomno=${e}&servicename=${f}&price=${g}`;
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
    let url=`${this.U}/deleteservicepayment?serviceid=${a}`;
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

      const urlParams = new URLSearchParams(window.location.search);
      const myParam = urlParams.get('vrno');
      //console.log(myParam)
      $("#vrno").val(myParam);
      //deptchange();
      this.display();

    }
    }

</script>


<template>


<div class="container-fluid">

<br/>   <h1 class="text-center" :style="{color:'blue'}"> 👨‍💻 Service Payment Information 📝 </h1> <hr/> 

<div class="row">
<div class="col-sm-3" :style="{color:'black',fontWeight:'bold'}">

<div class="form-group">
<label for="serviceid">Service ID</label>
<input type="text" id="serviceid" class="form-control"/>
</div>

<div class="form-group">
<label for="date"> Date </label>
<input type="date" id="date" class="form-control"/>
</div> <br/>

<div class="form-group">

    Book ID:  <select id="bookid" name="bookid" v-on:change="change1()" >

                <option value=""> Select Your  Book ID </option> 
                  
                
                <option :value="option.bookid" v-for="option in bookid" :style="{backgroundColor:'lightgreen',fontWeight:'bold'}" > {{option.bookid}}</option> 
        
               
                                                

              </select>


</div> <br/>



    <div v-for="bd in bookdetails">

      <!-- <div class="form-group">
      <label for="regid"> Registration ID</label>
      <input type="text" id="regid" class="form-control" :value="bd.regid"/>
      </div> -->

      <div class="form-group">
      <label for="roomno"> Room No </label>
      <input type="text" id="roomno" class="form-control" :value="bd.roomno"/>
      </div>

    </div>

            


<div class="form-group">


    Choose Your Service Name : <br/> <select id="servname" name="servname">

                    <option value="" > Select Your Services </option> 
                      
                    
                    <option :value="option.servname" v-for="option in servicename" :style="{backgroundColor:'lightyellow',fontWeight:'bold'}">  {{option.servname}}</option> 
            
                                
                  </select>

</div> <br/> 

<div class="form-group">
 <label for="price">Price</label>
 <input type="text" id="price" class="form-control"/>
</div> <br/>



<div class="form-group">

<div class="btn-group" role="group" aria-label="Basic mixed styles example">

<button type="button" class="btn btn-success btn-lg" v-on:click="add()"  >Add</button>

<button type="button" class="btn btn-info btn-lg"  v-on:click="update()"  >Update</button>

</div>
</div> <br/>

<div class="form-group">
<div id="action"></div>
</div>
</div> 

<div class="col-sm-9">

<table class="table table-bordered" :style="{textAlign:'center',border:'5px solid blue'}">



<thead :style="{color:'black',backgroundColor:'lightgreen'}">

<th>Service ID</th>

<th>Date</th>

<th> Booking ID </th>
<!-- <th> Registration ID </th> -->
<th>Room No</th>
<th> Service Name</th>
<th> Price</th>
<th>Service  Status </th>



</thead>

<tbody id="tb" :style="{color:'black',fontSize:'large'}">

 <tr v-for="bd in lineitems" v-on:click="show(bd.serviceid,bd.date,bd.bookid,bd.regid,bd.roomno,bd.servicename,bd.price,index)"  >

<td>{{bd.serviceid}}</td>

<td>{{bd.date}}</td>

<td>{{bd.bookid}}</td>
<!-- <td>{{bd.regid}}</td> -->
<td>{{bd.roomno}}</td>
<td>{{bd.servicename}}</td>
<td>{{bd.price}}</td>


 <!-- <td><img  @error="replaceByDefault" :src="getPic(d.picture)" class="img-fluid"/></td>--> 

<td><button type="button"  class="btn btn-success" v-on:click="remove(bd.serviceid)" > Successful </button></td>

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
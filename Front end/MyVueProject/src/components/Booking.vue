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
    U:"http://localhost:8000/Booking",

    ImageU:"http://localhost/VUE JS/MyVueProject"

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

     let a=$("#bookid").val();
     let b=$("#pkgid").val();
     let c=$("#type").val();
     let d=$("#Name").val();
     let e=$("#Number").val();
     let f=$("#NID").val();
     let g=$("#chooseGuests").val();
     let h=$("#date").val();
     let i=$("#chooseDestination").val();

    axios.get(`${this.U}/insertbooking?bookid=${a}&pkgid=${b}&type=${c}&Name=${d}&Number=${e}&NID=${f}&chooseGuests=${g}&date=${h}&chooseDestination=${i}`)
    .then(response => {
    $("#action").html(response.data.total+" records Inserted");
    this.work();
    return response
    })
    .catch(error => {
    return error
    });
    },

    show(a,b,c,d,e,f,g,h,i){

        $("#bookid").val(a);
        $("#pkgid").val(b);
        $("#type").val(c);
        $("#Name").val(d);
        $("#Number").val(e);
        $("#NID").val(f);
        $("#chooseGuests").val(g);
        $("#date").val(h);
        $("#chooseDestination").val(i);

        $("#imgprev").css("display",'block');
        $("#imgprev").attr("src","upload/"+k);

    },


    update(){

        let a=$("#bookid").val();
        let b=$("#pkgid").val();
        let c=$("#type").val();
        let d=$("#Name").val();
        let e=$("#Number").val();
        let f=$("#NID").val();
        let g=$("#chooseGuests").val();
        let h=$("#date").val();
        let i=$("#chooseDestination").val();

    let url=`${this.U}/updatebooking?bookid=${a}&pkgid=${b}&type=${c}&Name=${d}&Number=${e}&NID=${f}&chooseGuests=${g}&date=${h}&chooseDestination=${i}`;
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
    let url=`${this.U}/deletebooking?bookid=${a}`;
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

    <br/>   <h1 class="text-center" :style="{color:'blue'}"> 👨‍💻 Booking Details Information 📝 </h1> <hr/> 

    <div class="row">
     <div class="col-sm-0">

        <!-- <div class="form-group">
         <label for="Code">Code</label>
         <input type="text" id="Code" class="form-control"/>
        </div> -->

         <!-- <div class="form-group">
         <label for="TestCode">TextCode</label>
         <input type="text" id="TestCode" class="form-control"/>
        </div> -->

         <!-- <div class="form-group">
         <label for="Type">Type</label>
         <input type="text" id="Type" class="form-control"/>
        </div>-->

         <!-- <div class="form-group">
         <label for="GroupCode">GroupCode</label>
         <input type="text" id="GroupCode" class="form-control"/>
        </div> -->

         <!-- <div class="form-group">
         <label for="Investigation">Investigation</label>
         <input type="text" id="Investigation" class="form-control"/>
        </div>-->

         <!-- <div class="form-group">
         <label for="Details">Details</label>
         <input type="text" id="Details" class="form-control"/>
        </div>-->

         <!-- <div class="form-group">
          <label for="Amount">Amount</label>
          <input type="number" id="Amount" class="form-control"/>
         </div>-->

         <!--  <div class="form-group">
         <input type="file" id="file" name="file" @change="onFileChange($event)" />
         <input type="hidden" id="picture" />
         <input type="button" class="button" value="Upload" id="but_upload" v-on:click="upload()"/>
          <hr/>

            <div :style="{marginTop: '40px'}" >
             <img src="" class="prevel img-fluid" id="imgprev" width="300" :style="{display: 'none'}" />
             <a href="#" target="_blank" class="prevel" id="fileprev" :style="{display: 'none'}">View File</a>
            </div>
        </div>-->


         <!-- <div class="form-group">
         <div class="btn-group" role="group" aria-label="Basic mixed styles example">
          <button type="button" class="btn btn-info" v-on:click="add()">Add</button>
          <button type="button" class="btn btn-success" v-on:click="update()">Update</button>
         </div>
        </div> -->

    <div class="form-group">
    <div id="action"></div>
    </div>
    </div>
    <div class="col-sm-12">

    <table class="table table-bordered" :style="{textAlign:'center',border:'5px solid blue'}">
     <!-- <caption>Total Rows: <span id="tot">{{lineitems.length}}</span></caption> -->

        <thead :style="{color:'black',backgroundColor:'lightgreen'}">

            <th>Booking ID</th>
            <th>Customer Name</th>
            <th>Contact Number</th>
            <th>Choose Guests</th>
            <th>Date</th>
            <th>Choose Destination</th>
            <th>Booking Status</th>
            

        </thead>

        <tbody id="tb" :style="{color:'black',fontSize:'large'}">

            <tr  v-for="d in lineitems" v-on:click="show(d.bookid,d.pkgid,d.type,d.Name,d.Number,d.NID,d.chooseGuests,d.date,d.chooseDestination,index)" >

                <td>{{d.bookid}}</td>
                <td>{{d.Name}}</td>
                <td>{{d.Number}}</td>
                <td>{{d.chooseGuests}}</td>
                <td>{{d.date}}</td>
                <td>{{d.chooseDestination}}</td>
                
                 <!--<td><img  @error="replaceByDefault" :src="getPic(d.picture)" class="img-fluid"/></td> -->
                <td><button type="button"  class="btn btn-success" v-on:click="remove(d.bookid)" >Successful</button></td>
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
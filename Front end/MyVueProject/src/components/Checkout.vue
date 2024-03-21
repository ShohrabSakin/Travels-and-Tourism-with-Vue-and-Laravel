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

    U:"http://localhost:8000/Servicepayment",

    ImageU:"http://localhost/VUE JS/MyVueProject",
    globalvariables:{
        st:[],
        index:0
    }

    }
    },
    created() {
        this.start();
    this.display();
    },

    methods: {
    //self = this,

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

    if(this.substring3==null){
        $("#date").val(convertDate(new Date()) );
    }
    },
    convertDate(inputFormat) {
function pad(s) { return (s < 10) ? '0' + s : s; }
var d = new Date(inputFormat)
return [d.getFullYear(), pad(d.getMonth() + 1), pad(d.getDate())].join('-')
},

    display() {
       
        // alert(`${this.U}/getservices`)
    axios.get(`${this.U}/getservices`)
    .then(response => {
    this.lineitems = response.data;
    //alert(this.lineitems)
    return response
    })
    .catch(error => {
    return error
    });



             // <--  Dropdown Code  ----> // 
             axios.get(`http://localhost:8000/Servicepayment/gethotelbookid`)
                .then(response => {

                this.bookid=response.data;

                return response
      });

    },

         // <---  From date - To date  Code  from sir --->  // 

             daysdifference(firstDate, secondDate){  
                var startDay = new Date(firstDate);  
                var endDay = new Date(secondDate);  
            
            // Determine the time difference between two dates     
                var millisBetween = startDay.getTime() - endDay.getTime();  
            
            // Determine the number of days between two dates  
                var days = millisBetween / (1000 * 3600 * 24);  
            
            // Show the final number of days between dates     
                return Math.round(Math.abs(days));  
            },


             // Print Work // 
             Clickheretoprint(){
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

          add2(){
           const urlParams = new URLSearchParams(window.location.search);
           const myParam = urlParams.get('bookid');
          let a=myParam;//$("#regid").find('option:selected').val();
        // alert(a);
         //alert(JSON.stringify(registration2))
         let sum=0;
         for (let i = 0; i < this.lineitems.length; ++i) {
        sum+=Number(this.lineitems[i].price)

         }

         let totalservice=sum;

        let d=0;
        for (let i = 0; i < this.bookdetails.length; ++i) {
          //alert(registration2[i].name)
        let b=this.bookdetails[i].bookid;
        //alert(registration2[i].dis_date)
        const today = new Date();
        const yyyy = today.getFullYear();
        let mm = today.getMonth() + 1; // Months start at 0!
        let dd = today.getDate();
  
        if (dd < 10) dd = '0' + dd;
        if (mm < 10) mm = '0' + mm;
  
        const formattedToday = mm + '/' + dd + '/' + yyyy;
        let c=formattedToday;//registration2[i].dis_date;//$("#dis_date").val();
        let d=this.bookdetails[i].fromdate;//$("#fromdate").val();
        let d2=this.bookdetails[i].todate;
        let f=formattedToday;//$("#todate").val();
        let g=this.bookdetails[i].roomno;//$("#roomno").val();
         let h=$("#total").val();
          let k=$("#total").val();
        
  
        let l=$("#totalservice").val();
        let m=$("#linetotal").val();
        let n=$("#linediscount").val();
        let o=$("#linenet").val();
        let q=$("#linepaid").val();
        let r=$("#linedue").val();
       
        let  url=`http://localhost:8000/Checkout/InsertCheckout?bookid=${b}&date=${c}&fromdate=${d}&todate=${d2}&roomno=${g}&price=${$("#price").val()}&day=${h}&total=${k}&totalservice=${totalservice}&linetotal=${m}&linediscount=${n}&linenet=${o}&linepaid=${q}&linedue=${r}`;
        
        console.log(url);
        axios.get(url)
        .then(response => {
        //alert(data);
        // data=JSON.parse(data)
        // $("#action").html(response.data.total+" records Inserted");
        // print();

        $("#output").html("✅ Check-out Successfully")

        });
      }
        
        },


        //  linetotal,linenet,linepaid,linedue // 

         changeExtra(a) 
        {
            $("#linenet").val( Number($("#linetotal").val())-Number($("#linediscount").val())) ;
            $("#linedue").val(Number($("#linenet").val())-Number($("#linepaid").val())) ;
          },


          change1(){

          let  ic=$("#bookid").val();
          //alert(`http://localhost:8000/Servicepayment/getrecordsfrombookid?bookid=${ic}`)
            axios.get(`http://localhost:8000/Servicepayment/getrecordsfrombookid?bookid=${ic}`)
            .then(data => {   
            this.bookdetails=data.data;

            axios.get('http://localhost:8000/Rooms/getroom?roomno='+ data.data[0].roomno)
           .then(data2 => {            

                axios.get(`${this.U}/getservicepayment?bookingid=${ic}`)
                .then(data3 => {  
                let amt=0;
                data3=data3.data
                this.globalvariables.st=data3;
                this.items= data3;
                this.lineitems= this.globalvariables.st;
                    // alert(JSON.stringify(this.lineitems))
                for(let d in data3){
                    // alert(data3[d].price)
                    amt+=Number(data3[d].price);
                }
                $("#day").val(this.daysdifference(data.data[0].fromdate,data.data[0].todate) )
                $("#price").val(data2.data[0].price) ;
        //    $("#day").val(daysdifference(data[0].admitdate,new Date()) )
                 $("#total").val(data2.data[0].price*$("#day").val()) ;
                 $("#linetotal").val(amt+Number($("#total").val()));
                });

        });


            })
            .catch(error => {
            });

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
        $("#imgprev").attr("src","upload/"+k);

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


<div class="container-fluid" id="content" >

   

<button  :style="{float:'right'}" class="btn btn-success btn-mini" v-on:click="Clickheretoprint()" >Print</button>

<!-- <button  :style="{float:'right'}" class="btn btn-primary btn-mini" v-on:click="print()" >Print</button>  -->  



<br/>   <h1 class="text-center" :style="{color:'blue'}" > 🏛 🏫 🏦 Hotel  Check-Out  Information 📝 </h1> <hr/> 


   <div class="row" :style="{textAlign:'center',fontSize:'large',fontWeight:'bold',color:'black'}" > 

       <div class="col-lg-12"> 
        
           <div class="form-group">

                
             Book ID : <select id="bookid" name="bookid"   v-on:change="change1()" onInput="change1()" >

                           <option value=""> Select Your  Book ID </option> 
                        
                           

                             <option :value="option.bookid" v-for="option in bookid" :style="{backgroundColor:'lightgreen',fontWeight:'bold'}" >{{option.bookid}}</option> 

                           

                         </select>

            </div>

        </div>


   </div> <br/>

   

             <div v-for="bd in bookdetails" > 

               <div class="row" :style="{textAlign:'center',fontSize:'large',fontWeight:'bold',color:'black'}"> 

                   <div class="col-lg-6"> 
               
                       <div class="form-group">

                         <label for="bookid">Booking ID:</label> &nbsp;

                         <input type="text" id="bookid" :value="bd.bookid"   />
                   

                       </div>

                   </div>

               

                   <div class="col-lg-6"> 
           
                       <div class="form-group">

                        <label for="date" >Booking Date</label> 

                        <input type="text" id="date" :style="{marginLeft:'10px'}"  :value="bd.date" />
       

                       </div>

                   </div>


               </div> <br/>




               <div class="row" :style="{textAlign:'center',fontSize:'large',fontWeight:'bold',color:'black'}"> 

                   <div class="col-lg-6"> 
               
                       <div class="form-group">

                        <label for="fromdate"> From Date </label> &nbsp;

                        <input type="text" id="fromdate" :value="bd.fromdate" />
                   

                       </div>

                   </div>

               

                   <div class="col-lg-6"> 
           
                       <div class="form-group">

                        <label for="todate"> To Date </label>  &nbsp;

                         <input type="text" id="todate" :value="bd.todate"  />
       

                       </div>

                   </div>


               </div> <br/>



               <div class="row" :style="{textAlign:'center',fontSize:'large',fontWeight:'bold',color:'black'}"> 

                   <div class="col-lg-6"> 
               
                       <div class="form-group">

                        <label for="roomno">Room Number</label> &nbsp;

                        <input type="text" id="roomno" :value="bd.roomno" />
                   

                       </div>

                   </div>

               

                   <div class="col-lg-6"> 
           
                       <div class="form-group">

                         <label for="price"> Price</label>  &nbsp;

                         <input type="text" id="price"  />
       

                       </div>

                   </div>


               </div> <br/>

           </div>                      

               <div class="row" :style="{textAlign:'center',fontSize:'large',fontWeight:'bold',color:'black'}"> 

                   <div class="col-lg-6"> 
               
                       <div class="form-group">

                        <label for="day">Day  of stay </label> &nbsp;

                        <input type="text" id="day"  />
                   

                       </div>

                   </div>

               

                   <div class="col-lg-6"> 
           
                       <div class="form-group">

                         <label for="total"> Total </label>  &nbsp;

                         <input type="text" id="total"  />
       

                       </div>

                   </div>


               </div> <hr/> 

               <br/>   <h3 class="text-center" :style="{color:'blue'}"> 👨‍💻 Service  Payment Voucher 📝 </h3> <hr/> 


               <div class="row"> 

                   <div class="col-lg-12"> 

                           
                       <table class="table table-bordered" :style="{textAlign:'center',border:'5px solid blue'}">

                          

                           <thead :style="{color:'black',backgroundColor:'lightgreen'}">

                               <th>SL No</th>
                               <th>Service ID</th>
                               <th>Date</th>
                               <th>Room No</th>
                               <th> Service Name</th>
                               <th> Price</th>
                               



                            </thead>

                           <tbody id="tb" :style="{color:'black',fontSize:'large'}">

                               
                                <tr v-for="(bd,index) in lineitems" >

                                    <td>{{index+1}}</td>
                                    <td>{{bd.serviceid}}</td>

                                    <td>{{bd.date}}</td>

                                   <td>{{bd.roomno}}</td>
                                   <td>{{bd.servicename}}</td>
                                  <td>{{bd.price}}</td>

                                 

                                 </tr>

                               

                           </tbody>


                           <tfoot>
                               <tr>
                               <td colspan="5" :style="{textAlign : 'right',color:'black'}" >Total</td>
                               <td><input type="text" name="linetotal" id="linetotal" class="form-control" :style="{color:'black',fontWeight:'bold'}"/></td>
                               </tr>
                               <tr>
                               <td colspan="5" :style="{textAlign : 'right',color:'black'}">Discount</td>
                               <td><input type="text" name="linediscount" id="linediscount" class="form-control"  v-on:change="changeExtra()"  :style="{color:'black',fontWeight:'bold'}" /></td>
                               </tr>
                               <tr>
                               <td colspan="5" :style="{textAlign : 'right',color:'black'}">Net</td>
                               <td><input type="text" name="linenet" id="linenet" class="form-control" :style="{color:'black',fontWeight:'bold'}" /></td>
                               </tr>
                               <tr>
                               <td colspan="5" :style="{textAlign : 'right',color:'black'}">Paid</td>
                               <td><input type="text" name="linepaid" id="linepaid" class="form-control"  v-on:change="changeExtra()" :style="{color:'black',fontWeight:'bold'}" /></td>
                               </tr>
                               <tr>
                               <td colspan="5" :style="{textAlign : 'right',color:'black'}">Due</td>
                               <td><input type="text" id="linedue" class="form-control" :style="{color:'black',fontWeight:'bold'}" /></td>
                               </tr>

                           </tfoot>

                       </table>

                    </div>

       

               </div> 


               <div class="d-grid gap-2 col-12 mx-auto">

                   <button type="button" class="btn btn-danger btn-lg" :style="{fontSize:'larger'}"  v-on:click="add2()" > Check  Out   </button> 

               </div>  <br/>

               

               <div id="output" :style="{fontWeight:'bold',fontSize:'larger',textAlign:'center',color:'blue'}"> 
               
                </div>   <br/>


               


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
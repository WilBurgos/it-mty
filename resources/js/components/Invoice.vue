<template>
<div class="icuTXu">
    <div class="fyYIGp">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <h1>Invoice</h1>
                        <div class="row">
                            <div class="col-12">
                                <form>
                                    <div class="mb-3">
                                        <input type="text" name="company_name" id="company_name" class="form-control" placeholder="Your Company*" v-model="company.company_name">
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" name="name" id="name" class="form-control" placeholder="Your First and Last Name*" v-model="company.name">
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" name="web" id="web" class="form-control" placeholder="Company Website*" v-model="company.web">
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" name="company_address" id="company_address" class="form-control" placeholder="Company Address" v-model="company.address">
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" name="city" id="city" class="form-control" placeholder="City, State ZIP" v-model="company.city">
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" name="country" id="country" class="form-control" placeholder="Country" v-model="company.country">
                                    </div>
                                    <div class="mb-3">
                                        <input type="number" name="phone" id="phone" class="form-control" placeholder="Phone No.*" v-model="company.phone">
                                    </div>
                                    <div class="mb-3">
                                        <input type="email" name="email" id="email" class="form-control" placeholder="Email Address*" v-model="company.email">
                                    </div>
                                </form>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-12">
                                <form>
                                    <div class="mb-3">
                                        <input type="text" name="client_company" id="client_company" class="form-control" placeholder="Client's Company" v-model="client.company_name">
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" name="client_name" id="client_name" class="form-control" placeholder="Client's Name" v-model="client.name">
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" name="client_address" id="client_address" class="form-control" placeholder="Client's Address" v-model="client.address">
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" name="client_city" id="client_city" class="form-control" placeholder="City, State ZIP" v-model="client.city">
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" name="client_country" id="client_country" class="form-control" placeholder="Country" v-model="client.country">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="row">
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Logo</label>
                                <input class="form-control" type="file" id="formFile">
                            </div>
                        </div>
                        <div class="row">
                            <form>
                                <div class="mb-3">
                                    <label for="invoice_no">Invoice No:</label>
                                    <input type="number" name="invoice_no" id="invoice_no" class="form-control" v-model="invoice.no">
                                </div>
                                <div class="mb-3">
                                    <label for="invoice_date">Invoice Date:</label>
                                    <input type="date" name="invoice_date" id="invoice_date" class="form-control" v-model="invoice.date">
                                </div>
                                <div class="mb-3">
                                    <label for="due_date">Due Date:</label>
                                    <input type="date" name="due_date" id="due_date" class="form-control" v-model="invoice.due">
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <table class="table table-sm" @mouseover="butonitem=true" @mouseleave="butonitem=false" >
                            <thead class="table-primary">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Hours</th>
                                    <th scope="col">Rate</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(item) in items" v-bind:key="item.id">
                                    <th scope="row">{{ item.id }}</th>
                                    <td> <input type="text" v-model="item.description"></td>
                                    <td><input type="number" v-model="item.hours"></td>
                                    <td><input type="number" v-model="item.rate" @keyup="changetotal(item.rate)"></td>
                                </tr>
                            </tbody>
                            <input type="button" value="+ Add More" v-if="butonitem" class="btn btn-primary" @click="add_item()">
                        </table>
                    </div>

                </div>
                <div class="row">
                    <div class="col-6">
                        <form>
                            <div class="mb-3">
                                <textarea name="notes" id="notes" cols="30" rows="8" v-model="invoice.notes"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="col-6">
                        <div class="row">
                            <form>
                                <div class="row mb-3">
                                    <label for="subtotal" class="col-sm-4 col-form-label">Subtotal</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" id="subtotal" v-model="subtotal">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="tax" class="col-sm-4 col-form-label">Tax</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" id="tax" v-model="tax">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="discount" class="col-sm-4 col-form-label">Discount</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" id="discount" v-model="discount">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="total" class="col-sm-4 col-form-label">Total</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" id="total" v-model="invoice.total">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <input type="button" value="Download Now" class="btn btn-primary" @click="save_invoice()">
        </div>
    </div>

</div>

</template>

<script>
export default {
    data(){
        return{
            client:{
                company_name:"",
                name:"",
                address:"",
                city:"",
                country:""
            },
            company:{
                company_name:"",
                name:"",
                web:"",
                address:"",
                city:"",
                country:"",
                phone:"",
                email:"",
                logo:""
            },
            invoice:{
                no:"",
                date:"",
                due:"",
                notes:'',
                total:0
            },
            items:[
                {
                    id: 1,
                    description: "item description",
                    hours: 1,
                    rate: 0.00
                }
            ],
            subtotal:0.00,
            tax:0,
            discount:0,
            butonitem:false
        }
    },
    created() {

    },
    computed:{

    },
    methods:{
        save_invoice(){
            axios.post('invoice',{
                client: this.client,
                company: this.company,
                invoice: this.invoice,
                items: this.items
            }).then(response =>{
                console.log(response)
                alert("Invoice saved")
            }).catch((error) => {
                console.log(error)
                alert(error)
            });
        },
        add_item(){
            let count = this.items.length
            this.items.push(Vue.util.extend({
                id: count+1,
                description: "item description",
                hours: 1,
                rate: 0.00
            }))
        },
        changetotal(data){

            let suma = 0
            this.items.forEach(element => {
                suma = parseInt(suma) + parseInt(element.rate)
            });
            this.subtotal = suma
            this.invoice.total = suma
        }
    }
}
</script>

<style>
.icuTXu {
    display: flex;
    -webkit-box-pack: center;
    justify-content: center;
    -webkit-box-align: center;
    align-items: center;
    box-sizing: content-box;
    width: 100%;
    margin: 0px auto;
    padding: 6em 0px;
    perspective: 500px;
    background-color: rgb(242, 245, 248);
    overflow: hidden;
}
.fyYIGp {
    position: relative;
    display: flex;
    flex-direction: column;
    -webkit-box-pack: justify;
    justify-content: space-between;
    width: 100%;
    max-width: 800px;
    padding: 1.5em 3em;
    color: rgb(45, 62, 80);
    backface-visibility: hidden;
    border: 1px solid rgb(242, 245, 248);
    border-radius: 0.2em;
    background-color: rgb(255, 255, 255);
    box-shadow: rgb(0 0 0 / 50%) 0px 0.5em 1.5em -0.5em;
    transition: transform 0.5s ease 0s;
}
</style>

<template>
    <div class="main">
        <div class="row">
            <div class="col-md-6">
                <div class="card shadow mb-4 border-bottom-success">
                    <!-- Card Header - Accordion -->
                    <a href="#collapseActiveOrder" class="d-flex justify-content-between card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseActiveOrder">
                        <h4 class="m-0 font-weight-bold text-success">Предметы</h4>
                        <h3 class="text-success"><i class="fas fa-money-check-alt"></i></h3>
                    </a>
                    <!-- Card Content - Collapse -->
                    <div class="collapse show" id="collapseActiveOrder">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>Студент</th>
                                        <th>Предмет</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="(order, index) in activeOrders" :key="index">
                                        <td>{{ order.studentName }}</td>
                                        <td>{{ order.orderName.product.name }}</td>
                                        <td class="text-center"><i @click="showInfo(order.orderName)" class="far fa-eye text-info" style="cursor: pointer"></i></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card shadow mb-4 border-bottom-warning">
                    <!-- Card Header - Accordion -->
                    <a href="#collapseDeactiveOrder" class="d-flex justify-content-between card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseDeactiveOrder">
                        <h4 class="m-0 font-weight-bold text-warning">Заказы</h4>
                        <h3 class="text-warning"><i class="fas fa-exclamation-circle"></i></h3>
                    </a>
                    <!-- Card Content - Collapse -->
                    <div class="collapse show" id="collapseDeactiveOrder">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>Студент</th>
                                        <th>Предмет</th>
                                        <th>Состояние</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="(order, index) in deactiveOrders" :key="index">
                                        <td>{{ order.studentName }}</td>
                                        <td>{{ order.orderName.product.name }}</td>
                                        <td class="bg-warning text-white" v-if="order.orderName.paid && order.orderName.active !== -1">Обрабатывается</td>
                                        <td class="bg-danger text-white" v-else-if="order.orderName.active === -1">Просрочено</td>
                                        <td class="bg-danger text-white" v-else>Не оплачено</td>
                                        <td class="text-center"><i @click="showInfo(order.orderName)" class="far fa-eye text-info" style="cursor: pointer"></i></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
    import axios from 'axios'

    export default {
        name: "UserSubjects",
        props: ['userId'],
        data() {
            return {
                orders: [],
            }
        },
        methods: {
            loadData() {
                axios.get('/get-students-products/').then((response) => {
                    for (let i in response.data) {
                        for (let j in response.data[i].orders) {
                            this.orders.push({
                                studentName: response.data[i].name,
                                orderName: response.data[i].orders[j]
                            })
                        }
                    }
                });
            },

            showInfo(order) {
                if (order.active === 1) {
                    swal.fire({
                        title: order.product.name,
                        icon: 'info',
                        html:
                            '<strong>Дата покупки: </strong>' + `<p>${order.activeDate.split(' ')[0]}</p>` +
                            '<strong>Истекает срок: </strong>' + `<p>12.08.2020</p>` +
                            '<strong>Состояние: </strong>' + `<p style="color: #4CAF50">Активно</p>`
                        ,
                        showCloseButton: true,
                        showCancelButton: false,
                        focusConfirm: false,
                        confirmButtonText:
                            '<i class="fa fa-thumbs-up"></i> Отлично!',
                        confirmButtonAriaLabel: 'Thumbs up, great!',
                    })
                } else if (order.paid && order.active !== -1) {
                    swal.fire({
                        title: order.product.name,
                        icon: 'info',
                        html:
                            '<strong>Дата добавления: </strong>' + `<p>${order.updated_at.split(' ')[0]}</p>` +
                            '<strong>Состояние: </strong>' + `<p style="color: #FF9800">Обрабаывается</p>`
                        ,
                        showCloseButton: true,
                        showCancelButton: false,
                        focusConfirm: false,
                        confirmButtonText:
                            '<i class="fa fa-thumbs-up"></i> Отлично!',
                        confirmButtonAriaLabel: 'Thumbs up, great!',
                    })
                } else if (order.active === -1) {
                    swal.fire({
                        title: order.product.name,
                        icon: 'info',
                        html:
                            '<strong>Дата окончания: </strong>' + `<p>${order.expireDate.split(' ')[0]}</p>` +
                            '<strong>Состояние: </strong>' + `<p style="color: #c62828">Просрочено</p>`
                        ,
                        showCloseButton: true,
                        showCancelButton: false,
                        focusConfirm: false,
                        confirmButtonText:
                            'Продлить',
                        confirmButtonAriaLabel: 'Thumbs up, great!',
                        preConfirm: () => {
                            window.location.href = '/pay-page/' + order.id
                        }
                    })
                } else {
                    swal.fire({
                        title: order.product.name,
                        icon: 'info',
                        html:
                            '<strong>Дата добавления: </strong>' + `<p>${order.created_at.split(' ')[0]}</p>` +
                            '<strong>Состояние: </strong>' + `<p style="color: #c62828">Не оплачено</p>`
                        ,
                        showCloseButton: true,
                        showCancelButton: false,
                        focusConfirm: false,
                        confirmButtonText:
                        'Оплатить',
                        confirmButtonAriaLabel: 'Thumbs up, great!',
                        preConfirm: () => {
                            window.location.href = '/pay-page/' + order.id
                        }
                    })
                }

            }
        },
        mounted() {
            this.loadData()
        },
        computed: {
            activeOrders() {
                return this.orders.filter(order => order.orderName.active === 1)
            },

            deactiveOrders() {
                return this.orders.filter(order => order.orderName.active !== 1)
            },
        }
    }
</script>

<style scoped>
</style>

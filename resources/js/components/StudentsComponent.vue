<template>
    <div class="main">
        <div class="card shadow-lg mb-4 border-bottom-success">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h5 class="m-0 font-weight-bold text-primary">Список студентов</h5>
                <button @click="addStudent" class="btn btn-success btn-circle mx-1 my-1">
                    <i class="fas fa-plus"></i>
                </button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ФИО</th>
                                <th>Возраст</th>
                                <th>Предметы</th>
                                <th>Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="student in students" :key="student.id">
                                <td>{{ student.name }}</td>
                                <td>{{ student.age }}</td>
                                <td>{{ student.products.map(product => { return product.name }).join(',') }}</td>
                                <td class="text-center">
                                    <button @click="delStudent(student)" class="btn btn-danger btn-circle mx-1 my-1">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                    <button @click="editStudent(student)" class="btn btn-warning btn-circle mx-1 my-1">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios'

    export default {
        name: "StudentsComponent",
        props: ['userId'],
        data() {
            return {
                students: []
            }
        },
        mounted() {
            this.loadData()
        },
        methods: {
            loadData() {
                axios.get('/get-students-products/').then((response) => {
                    this.students = response.data;
                });
            },

            addStudent() {
                swal.fire({
                    title: 'Добавить студента!',
                    html:
                        `<input id="name" class="swal2-input edit-input" placeholder="ФИО" ">` +
                        `<input type="number" id="age" class="swal2-input edit-input" placeholder="Возраст">`,
                    focusConfirm: false,
                    confirmButtonText: 'Добавить',
                    preConfirm: () => {
                        let name = document.getElementById('name').value
                        let age = document.getElementById('age').value
                        if (!name || name.match(/^ *$/) !== null) {
                            swal.showValidationMessage('Укажите ФИО!')
                        }
                        else if (!age || age.match(/^ *$/) !== null) {
                            swal.showValidationMessage('Укажите возраст!')
                        }
                        else {
                            axios.post('/student/add', {
                                name: name.toLowerCase()
                                    .split(' ')
                                    .map((s) => s.charAt(0).toUpperCase() + s.substring(1))
                                    .join(' '),
                                age: parseInt(age)
                            }).then(response => {
                                console.log(response);
                                toast.fire({
                                    icon: 'success',
                                    title: 'Успешно!'
                                });
                                this.loadData();
                            }).catch(e => {
                                console.warn(e)
                            });
                        }
                    }
                })
            },

            editStudent(student) {
                swal.fire({
                    title: 'Изменине данных студента!',
                    html:
                        `<input id="name" class="swal2-input edit-input" value="${student.name}" required>` +
                        `<input type="number" id="age" class="swal2-input edit-input" value="${student.age}" required>`,
                    focusConfirm: false,
                    confirmButtonText: 'Изменить',
                    preConfirm: () => {
                        let name = document.getElementById('name').value
                        let age = document.getElementById('age').value
                        if (!name || name.match(/^ *$/) !== null) {
                            swal.showValidationMessage('Укажите ФИО!')
                        }
                        else if (!age || age.match(/^ *$/) !== null) {
                            swal.showValidationMessage('Укажите возраст!')
                        }
                        else {
                            axios.post('/student/change/' + student.id, {
                                name: name.toLowerCase()
                                    .split(' ')
                                    .map((s) => s.charAt(0).toUpperCase() + s.substring(1))
                                    .join(' '),
                                age: parseInt(age)
                            }).then(response => {
                                console.log(response);
                                toast.fire({
                                    icon: 'success',
                                    title: 'Данные о студенте успешно обновлены!'
                                });
                                this.loadData();
                            }).catch(e => {
                                console.warn(e)
                            });
                        }
                    }
                })
            },

            delStudent(student) {
                if (student.products.length > 0) {
                    swal.fire({
                        icon: 'warning',
                        title: 'Вы не можете удалить студена!',
                        text: 'У студента присутствуют предметы обучения!',
                        showConfirmButton: false,
                        timer: 4000
                    })
                } else {
                    swal.fire({
                        title: 'Удаление студента!',
                        text: "Вы уверены что хотите удалить студента!?",
                        icon: 'error',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Да, удалить!'
                    }).then((result) => {
                        console.log(result.value)
                        if (result.value) {
                            axios.delete('/student/delete/' + student.id)
                                .then(response => {
                                    console.log(response);
                                    swal.fire(
                                        'Удалено!',
                                        'Студент был удален!',
                                        'success'
                                    );
                                    this.loadData();
                                })
                                .catch(e => {
                                    console.warn(e)
                                });
                        }
                    });
                }

            }
        }
    }
</script>

<style>
    .edit-input {
        border-radius: 25px;
        width: 100%;
    }

</style>

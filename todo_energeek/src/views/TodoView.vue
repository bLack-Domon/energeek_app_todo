<!-- src/views/HomeView.vue -->
<script setup>
import { ref, onMounted } from 'vue'
import axios from 'axios'
import Swal from 'sweetalert2'

const categories = ref([])
const todos = ref([{ description: '', category: '' }])
const isSubmitting = ref(false)

const user = ref({
  name: '',
  username: '',
  email: ''
})

const fetchCategories = async () => {
  try {
    const response = await axios.get('http://127.0.0.1:8000/api/kategori')
    categories.value = response.data
  } catch (error) {
    console.error('Error fetching categories:', error)
  }
}

onMounted(() => {
  fetchCategories()
})

const addTodo = () => {
  todos.value.push({
    description: '',
    category: ''
  })
}

const removeTodo = (index) => {
  Swal.fire({
    title: 'Are you sure?',
    text: 'Do you want to delete this item?',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, delete it!',
    cancelButtonText: 'No, cancel!'
  }).then((result) => {
    if (result.isConfirmed) {
      todos.value.splice(index, 1)
      Swal.fire('Deleted!', 'Your task has been deleted.', 'success')
    }
  })
}

const submitForm = async () => {
  isSubmitting.value = true
  const payload = {
    user: user.value,
    tasks: todos.value
  }

  try {
    await axios.post('http://127.0.0.1:8000/api/tambah_todo', payload)
    Swal.fire('Success!', 'Your tasks have been saved.', 'success').then(() => {
      window.location.reload()
    })
  } catch (error) {
    console.error('Error submitting data:', error.response ? error.response.data : error.message)
    Swal.fire('Error!', 'There was a problem saving your tasks.', 'error')
  } finally {
    isSubmitting.value = false
  }
}
</script>

<template>
  <div class="container">
    <div class="row mb-4">
      <div class="col-12 col-md-12">
        <img src="@/assets/icon.png" alt="" />
      </div>
    </div>

    <form @submit.prevent="submitForm">
      <div class="row mb-4">
        <div class="col-12 col-md-12">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-12 col-md-4 mb-3">
                  <div class="form-group">
                    <label>Nama</label>
                    <input
                      type="text"
                      class="form-control"
                      placeholder="Nama"
                      v-model="user.name"
                    />
                  </div>
                </div>
                <div class="col-12 col-md-4 mb-3">
                  <div class="form-group">
                    <label>Username</label>
                    <input
                      type="text"
                      class="form-control"
                      placeholder="Username"
                      v-model="user.username"
                    />
                  </div>
                </div>
                <div class="col-12 col-md-4 mb-3">
                  <div class="form-group">
                    <label>Email</label>
                    <input
                      type="email"
                      class="form-control"
                      placeholder="Email"
                      v-model="user.email"
                    />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row mb-3">
        <div class="col-12 col-md-6">
          <label>To Do List</label>
        </div>
        <div class="col-12 col-md-6 text-end">
          <a href="#" class="btn btn-sm add_todo" @click="addTodo"
            ><i class="fas fa-plus me-1"></i> Tambah To Do</a
          >
        </div>
      </div>
      <div v-for="(todo, index) in todos" :key="todo.id" class="row mb-3">
        <div class="col-12 col-md-10">
          <div class="form-group">
            <label>Judul To Do</label>
            <input
              type="text"
              class="form-control"
              placeholder="Contoh: Perbaikan API Master"
              v-model="todo.description"
            />
          </div>
        </div>
        <div class="col-12 col-md-2 d-flex align-items-center">
          <div class="form-group me-2 flex-grow-1">
            <label>Kategori</label>
            <select class="form-control" v-model="todo.category">
              <option disabled value="">Pilih Kategori</option>
              <option v-for="category in categories" :key="category.id" :value="category.id">
                {{ category.name }}
              </option>
            </select>
          </div>
          <div class="btn btn-sm btn-danger" @click="removeTodo(index)">
            <i class="fas fa-trash"></i>
          </div>
        </div>
      </div>

      <div class="row mb-5" v-if="todos.length > 0">
        <div class="col-12 col-md-12">
          <div class="d-grid">
            <button class="btn btn-success" type="submit" :disabled="isSubmitting">
              {{ isSubmitting ? 'Saving...' : 'Simpan' }}
            </button>
          </div>
        </div>
      </div>
    </form>
  </div>
</template>

<style scoped>
img {
  display: block;
  margin-top: 40px;
  margin-left: auto;
  margin-right: auto;
  width: 30%;
}

label {
  font-weight: bold;
}

.add_todo {
  background-color: #ffe2e5;
  color: #f1416c;
  width: 165px;
}

.add_todo:hover {
  background-color: #f1416c;
  color: #ffffff;
}

.btn-danger {
  margin-top: 1.5rem;
}

@media (max-width: 576px) {
  .add_todo {
    margin-top: -55px;
  }
}
</style>

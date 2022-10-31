<template>
  <div class="container-fluid">
    <div
      class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <div class="btn-toolbar mb-2 mb-md-0">
        <RouterLink :to="`/adicionar`" class="btn btn-sm btn-outline-primary">
          Adicionar
        </RouterLink>
      </div>
    </div>
    <div class="table-responsive">
      <table class="table table-striped table-sm">
        <thead>
          <tr>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Marca</th>
            <th>Voltagem</th>
            <th>Imagem</th>
            <th>Ações</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="product in products" :key="product.id">
            <td>{{ product.name }}</td>
            <td>{{ product.description }}</td>
            <td>{{ product.brand }}</td>
            <td>{{ product.tension }}</td>
            <td v-if="product.image != ''"><img :src="product.image" width="100" /></td>
            <td v-else></td>
            <td>
              <div class="btn-group">
                <RouterLink :to="`/${product.id}/editar`" class="btn btn-sm btn-outline-primary">
                  Editar
                </RouterLink>
                <a href="javascript:void(0);" @click="del(product.id)"
                  class="btn btn-sm btn-outline-primary">Apagar</a>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="pagination">
      <li class="page-item">
        <a href="javascript:void(0)" class="page-link" @click="prev">Anterior</a>
      </li>
      <li class="page-item">
        <a href="javascript:void(0)" class="page-link" @click="next">Próximo</a>
      </li>
    </div>
  </div>
</template>

<script lang="ts">
import { ref, onMounted, defineComponent } from 'vue';
import { Product } from '@/classes/Product';
import api from '@/services/api';

export default defineComponent({
  name: 'ProductComponent',
  props: {
    msg: String,
  },
  setup() {
    const products = ref([]);
    const page = ref(1);

    const load = async () => {
      const response = await api.get(`products?page=${page.value}`);
      products.value = response.data.data;
    }

    onMounted(load);

    const next = async () => {
      page.value++;
      load();
    }

    const prev = async () => {
      page.value--;
      load();
    }

    const del = async (id: number) => {
      if (confirm('Confirma apgar o produto?')) {
        await api.delete(`products/${id}`)

        products.value = products.value.filter((e: Product) => e.id !== id);
      }
    }

    return {
      products,
      next,
      prev,
      del
    }
  },

});
</script>
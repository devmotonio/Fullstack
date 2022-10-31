<template>
  <div class="container-fluid">
    <form @submit.prevent="submit">
      <div class="form-group">
        <label>Nome</label>
        <input type="text" class="form-control" name="nome" v-model="name" />
      </div>
      <div class="form-group">
        <label>Descrição</label>
        <textarea type="text" class="form-control" name="descricao" v-model="description"></textarea>
      </div>
      <div class="form-group">
        <label>Tensão</label>
        <input type="text" class="form-control" name="tensao" v-model="tension" />
      </div>
      <div class="form-group">
        <label>Marca</label>
        <input type="text" class="form-control" name="marca" v-model="brand" />
      </div>
      <div class="form-group">
        <label>Foto</label>
        <div class="input-group">
          <input type="text" class="form-control" name="foto" v-model="image" />
          <ImageUpload @file-uploaded="image = $event" />
        </div>
      </div>
      <button type="submit" class="btn btn-outline-secondary">Salvar</button>
    </form>
  </div>
</template>

<script lang="ts">
import { ref, onMounted, defineComponent } from 'vue';
import api from '@/services/api';
import { Product } from '@/classes/Product';
import { useRoute, useRouter } from 'vue-router';
import ImageUpload from '@/components/ImageUpload.vue';

export default defineComponent({
  name: 'ProductUpdateComponent',
  components: { ImageUpload },
  setup() {
    const name = ref('');
    const description = ref('');
    const tension = ref('');
    const brand = ref('');
    const image = ref('');
    const router = useRouter();
    const { params } = useRoute();

    onMounted(async () => {
      const response = await api.get(`products/${params.id}`);
      const product: Product = response.data;

      name.value = product.name;
      description.value = product.description;
      tension.value = product.tension;
      brand.value = product.brand;
      image.value = product.image;
    });

    const submit = async () => {
      await api.put(`products/${params.id}`, {
        name: name.value,
        description: description.value,
        tension: tension.value,
        brand: brand.value,
        image: image.value,
      });

      await router.push('/');
    }

    return {
      name,
      description,
      tension,
      brand,
      image,
      submit
    }
  },
});
</script>
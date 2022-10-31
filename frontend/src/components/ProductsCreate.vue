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
import { ref, defineComponent } from 'vue';
import api from '@/services/api';
import { useRouter } from 'vue-router';
import ImageUpload from '@/components/ImageUpload.vue';

export default defineComponent({
  name: 'ProductCreateComponent',
  components: {ImageUpload},
  setup() {
    const name = ref('');
    const description = ref('');
    const tension = ref('');
    const brand = ref('');
    const image = ref('');
    const router = useRouter();

    const submit = async () => {
      await api.post('products', {
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
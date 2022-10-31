<template>
  <label class="btn btn-primary">
    Carregar foto <input type="file" hidden @change="upload($event.target.files)" />
  </label>
</template>

<script lang="ts">
import { defineComponent } from 'vue';
import api from '@/services/api';

export default defineComponent({
  name: 'ImageUploadComponent',
  emits: ['file-uploaded'],
  setup(props, context) {
    const upload = async (files: FileList) => {
      const file = files.item(0) as File;

      const data = new FormData;
      data.append('image', file);

      const response = await api.post('imageupload', data);

      context.emit('file-uploaded', response.data.url);

    }

    return {
      upload
    }
  },

});
</script>
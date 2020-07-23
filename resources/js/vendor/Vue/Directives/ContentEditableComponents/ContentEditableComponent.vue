<template>
  <div>
    <button class="text-format-btn" type="button" @click="onTextFormat('bold')" title="Bold">
      <i class="fas fa-bold"></i>
    </button>
    <button class="text-format-btn" type="button" @click="onTextFormat('italic')" title="Italic">
      <i class="fas fa-italic"></i>
    </button>
    <button class="text-format-btn" type="button" @click="onTextFormat('underline')" title="Underline">
      <i class="fas fa-underline"></i>
    </button>
    <button class="text-format-btn" type="button" @click="onTextFormat('superscript')" title="Superscript">
      <i class="fas fa-superscript"></i>
    </button>
    <button class="text-format-btn" type="button" @click="onTextFormat('subscript')" title="Subscript">
      <i class="fas fa-subscript"></i>
    </button>
    <button class="text-format-btn" type="button" @click="onTextFormat('removeFormat')" title="Remove Format">
      <i class="fas fa-remove-format"></i>
    </button>
    <div
      class="content-editable"
      ref="editable"
      contenteditable
      v-on="listeners"
      v-html="value"
    >
    </div>
  </div>
</template>

<script>
export default {
  props: ['value', 'saved'],
  computed: {
    listeners: function() {
      if (this.saved) 
        this.onInput();
    },
  },
  updated: function() {
    this.$refs.editable.innerHTML = this.value;
  },
  methods: {
    onInput: function() {
      this.$emit('input', this.$refs.editable.innerHTML);
    },
    onTextFormat: function(action) {
      document.execCommand(action);
    }
  },
};
</script>

<style lang="scss" scoped>
  $d-black-1: #2B2B2B;
  $d-black-2: #5F5F5F;

  .content-editable {
    border: 1px solid black;
    min-height: 100px;
    font-size: 14px;
    padding: 10px;
    margin-top: 5px;
    white-space: pre-line;
  }

  .text-format-btn {
    -webkit-appearance: none;
    appearance: none;
    -moz-appearance: none;
    background-color: transparent;
    border: 1px solid $d-black-1;
    &:hover {
      background-color: $d-black-1;
      color: white;
    }
  }
</style>
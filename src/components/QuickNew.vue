<template>
	<div class="nodue-quicknew">
		<div class="content-editable">
			<div class="note-title"
				role="textbox"
				contenteditable="true"
				spellcheck="true"
				aria-label="Title">
			</div>
			<div class="note-body"
				role="textbox"
				contenteditable="true"
				spellcheck="true"
				aria-label="A New Note...">
			</div>
			<div class="note-actions">
				<button type="button" class="close-button">Close</button>
			</div>
		</div>
	</div>
</template>

<script>
// imports go here

export default {
  name: 'QuickNew',

  props: {},

  data() {
		return {}
  },

  computed: {},

  mounted() {},

  methods: {},
}
</script>

<style lang="scss" scoped>
.nodue-quicknew {
	display: flex;
	align-items: center;
	justify-content: center;

	.content-editable {
		border: 1px solid #c3c3c3;
		border-radius: 8px;
		box-shadow: 0 1px 2px 0 rgba(60, 64, 67, 0.3), 0 2px 6px 2px rgba(60, 64, 67, 0.15);
		width: 800px;

		.note-title {
			border-radius: 8px 8px 0 0;
		}

		.note-title, .note-body {
			background-color: white;
			border: none;
			color: #202124;
			padding: 1em;
			font-size: 1.25em;
			line-height: 1.33em;
			margin: 0;
			width: 100%;
		}

		.note-actions {
			border-radius: 0 0 8px 8px;
			padding: 0.75em;
		}
	}
}
</style>

<template>
    <div>
        <b-form class="d-flex">
            <input type="file" @change="onChange" placeholder="Choose a file" />
            <b-button @click="upload()">Upload</b-button>
            <b-button class="ml-5" @click="remove()">Remove</b-button>

        </b-form>
    </div>
</template>
<script>
import axios from 'axios';
import Compressor from 'compressorjs';
export default {
    data: () => ({
        file: null,
    }),
    methods: {
        onChange(e) {
            this.file = e.target.files[0];
        },
        upload() {
            console.log("original: ", this.file)
            if (this.isLt2MB(this.file)) {
                this.compress(this.file)
            } else {
                this.uploadWithoudCompress()
            }
        },
        compress(file) {
            new Compressor(file, {
                quality: 0.6,
                success(result) {
                    let myFile = new File([result], result.name, {
                        type: result.type
                    })
                    console.log("compressed: ", myFile)

                    let fd = new FormData();
                    fd.append('file', myFile)
                    axios.post('api/upload-file', fd).then(res => {
                        console.log("uploaded: ", res.data)
                    })
                }
            })
        },
        uploadWithoudCompress(file) {
            let fd = new FormData();
            fd.append('file', myFile)
            axios.post('api/upload-file', fd).then(res => {
                console.log("res: ", res.data)
            })
        },
        remove() {
            axios.post('api/remove-file', { name: this.file.name }).then(res => {
                console.log("removed: ", res.data)
            })
        },
        isLt2MB(file) {
            return file.size / 1024 / 1024 < 2;
        },
    }
}
</script>
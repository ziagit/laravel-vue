<template>
    <div>
        <b-form>
            <input type="file" @change="onChange" />
            <b-button @click="upload()">Upload</b-button>
            <b-button @click="remove()">Remove</b-button>
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
            console.log("file ", this.file)
        },
        upload() {
            console.log("original file: ", this.file);
            if (this.isLt2MB(this.file)) {
                this.uploadWithoutCompressing(this.file)
                return;
            }
            new Compressor(this.file, {
                quality: 0.2,
                success(result) {
                    const myFile = new File([result], result.name, {
                        type: result.type
                    })
                    let fd = new FormData()
                    fd.append('file', myFile);
                    axios.post('api/upload-file', fd).then(res => {
                        console.log("Uplaoded: ", res.data)
                    }).catch(err => console.log(err.response))
                }
            })
        },
        remove() {
            axios.post('api/remove-file', { name: this.file.name }).then(res => {
                console.log("Removed: ", res.data)
            }).catch(err => console.log(err.response))
        },
        uploadWithoutCompressing(file) {
            let fd = new FormData()
            fd.append('file', file);
            axios.post('api/upload-file', fd).then(res => {
                console.log("Uplaoded: ", res.data)
            }).catch(err => console.log(err.response))
        },
        isLt2MB(file) {
            return file.size / 1024 / 1024 < 2;
        },
    }
}
</script>
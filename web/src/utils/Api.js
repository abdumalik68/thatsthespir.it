import axios from "axios";

// export default axios.create({
//     baseURL: "https://api.thatsthespir.it/v1/",
//     responseType: "json"
// });

export default axios.create({
    baseURL: "http://localhost:8000/api/v1",
    responseType: "json"
});

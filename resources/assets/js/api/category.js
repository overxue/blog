import axios from 'axios'

export function getCategory() {
  const url = '/api/categories'
  return axios.get(url).then((res) => {
    return Promise.resolve(res.data)
  }).catch((e) => {
    console.log(e)
  })
}

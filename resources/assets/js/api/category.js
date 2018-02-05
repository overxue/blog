import axios from 'axios'
import {http} from './config'

export function getCategory() {
  const url = `${http}/api/categories`
  return axios.get(url).then((res) => {
    return Promise.resolve(res.data)
  }).catch((e) => {
    console.log(e)
  })
}

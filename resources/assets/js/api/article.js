import axios from 'axios'
import {http} from './config'

export function getArticle(category_id = 0) {
  const url = `${http}/api/articles?include=category&category_id=${category_id}`
  return axios.get(url).then((res) => {
    return Promise.resolve(res.data)
  }).catch((e) => {
    console.log(e)
  })
}

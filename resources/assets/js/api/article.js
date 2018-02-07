import axios from 'axios'
import {http} from './config'

export function getArticle(category_id = 0, page = 1) {
  const url = `${http}/api/articles?page=${page}&include=category&category_id=${category_id}`
  return axios.get(url).then((res) => {
    return Promise.resolve(res.data)
  }).catch((e) => {
    console.log(e)
  })
}

export function getArticledetail(id) {
  const url = `${http}/api/articles/${id}`

  return axios.get(url).then((res) => {
    return Promise.resolve(res.data)
  }).catch((e) => {
    console.log(e)
  })
}

import axios from 'axios'
import {http} from './config'

export function getArticle(page = 1) {
  const url = `${http}/api/articles?page=${page}&include=categories`
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

export function insertArticle(params) {
  let token = localStorage.getItem('token')
  const url = `${http}/api/articles`

  return axios.post(url, params, {headers:{'Authorization':`Bearer ${token}`}}).then((res) => {
    return Promise.resolve(res.status)
  }).catch((error) => {
    return Promise.resolve(error.response.data)
  })
}

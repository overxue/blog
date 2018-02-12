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

export function insertArticle(params) {
  const url = `${http}/api/articles`

  return axios.post(url, params, {headers:{'Authorization':'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vYmxvZy50ZXN0L2FwaS9hdXRob3JpemF0aW9ucyIsImlhdCI6MTUxODQyNTExMiwiZXhwIjoxNTE4NDI4NzEyLCJuYmYiOjE1MTg0MjUxMTIsImp0aSI6IlZQd243OGREZkczMVBpaDAiLCJzdWIiOjEsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.6t0UGC9QUMVREdtpu6gEgURBkOAAXXlyn-0PcPwol-Q'}}).then((res) => {
    console.log(res.data)
  }).catch((error) => {
    console.log(error.response.data)
    // return Promise.resolve(error.response.data)
  })
}

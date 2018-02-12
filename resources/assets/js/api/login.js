import axios from 'axios'
import {http} from './config'

export function login(username, password) {
  const url = `${http}/api/authorizations`
  return axios.post(url, {
    username: username,
    password: password
  }).then((res) => {
    return Promise.resolve(res.data)
  }).catch((error) => {
    return Promise.resolve(error.response.data)
  })
}

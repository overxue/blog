// 判断当前环境是development还是production
const debug = process.env.NODE_ENV !== 'production'
export const http = debug ? 'http://blog.test' : 'https://www.overxue.com'

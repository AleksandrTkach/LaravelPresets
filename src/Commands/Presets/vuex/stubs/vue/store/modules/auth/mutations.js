import * as types from './mutation-types';

export default {
    [types.EXAMPLE](state, payload) {
        state.example = payload;
    },
};
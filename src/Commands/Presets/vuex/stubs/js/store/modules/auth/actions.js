import auth from '../../../api/auth';

// import * as types from './mutation-types';

export const example = async () => {
    const json = await auth.example();

    return json;
};

export default {
    example,
};